<?php

namespace App\Http\View\Composers;

use App\KopiHelper\PermissionRegistry;
use App\KopiHelper\Registry;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class MenuComposer
{

    /**
     * Logged-in user.
     * 
     * @var object
     */
	protected $user;

    /**
     * List menu that user can access.
     * 
     * @var array
     */
    protected $access;

    /**
     * List of view where sidebar is not shown.
     * 
     * @var array
     */
    protected $exclude = [
        'auth.login',
        'auth.logout',
        'auth.register',
        'auth.verify',
        'auth.passwords.email',
        'auth.passwords.reset',
        'errors::404',
        'errors::419',
        'errors::illustrated-layout'
    ];

	/**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(!in_array($view->getName(), $this->exclude)) {
            if(config("auth.authz")) {
                $menu = $this->createMenu();
            }else{
                $menu = Cache::rememberForever('sidebar-' . (!empty($this->user->groupid) ? $this->user->groupid : ""), function() {
                    return $this->createMenu();
                });
            }

            $view->with("sidebar", $this->render($menu));
        }
    }

    public function checkViewName()
    {
        
    }

    /**
     * Create menu for sidebar
     * 
     * @return array|object
     */
    private function createMenu()
    {
        if(config("auth.authz")) {
            return \App\KopiHelper\Menu::getStructure();
        }else {
            $this->access = [];
            if (!empty($this->user->access)) {
                foreach ($this->user->access as $access) {
                    array_push($this->access, $access->id_menu);
                }
            }


            $main = Menu::isMain($this->access)->get();
            return $this->appendSub($main);
        }
    }

    /**
     * Append child to main menu.
     * 
     * @return object
     */
    private function appendSub($object)
    {
        foreach($object as $menu) {
            $sub = Menu::isSub($this->access, $menu->id)->get();
            if(!$sub->isEmpty()) {
                $menu->child = $sub;

                foreach($sub as $sub_menu) {
                    $sub_child = Menu::isSubChild($this->access, $sub_menu->id)->get();
                    if(!$sub->isEmpty()) {
                        $sub_menu->child = $sub_child;
                    }
                }
            }
        }

        return $object;
    }

    private function authorize($p){
        if(config("auth.authz")){
            if(is_array($p)){

                if(in_array(Registry::SETTING_KEY_ADMIN_WILAYAH, $p)){//special case
                    return $this->user->isAdminWilayah();
                }else if(in_array(null, $p)){//another special case :D
                    return true;
                };

                $p = json_encode($p);

            }

            return Gate::allows($p);
        }else{
            return true;
        }
    }

    /**
     * Render html menu
     * 
     * @return string
     */
    private function render($model, $selected=null)
    {
        $html = '';
        foreach($model as $menu) if($this->authorize($menu['permission'])){
            $html .= $this->createList($menu, 1, $menu["child"]);

            if (count($menu["child"]) != 0) {
                $html .= "<ul class='sub-menu'>";

                foreach($menu["child"] as $sub) if($this->authorize($sub['permission'])){
                    $html .= $this->createList($sub, 2, $sub["child"]);

                    if(count($sub["child"]) != 0) {
                        $html .= "<ul class='sub-menu'>";

                        foreach($sub["child"] as $subChild) if($this->authorize($subChild['permission'])){
                            $html .= $this->createList($subChild, 3, null);

                        }
                        $html .= "</ul>";
                    }
                    $html .= "</li>";
                }
                $html .= "</ul>";
            }
            $html .= "</li>";
        }

        return $html;
    }

    /**
     * Create html list for menu.
     * 
     * @return string
     */
    private function createList($model, $level, $child)
    {
        $hasChild = $child != null && ((is_object($child) && !empty($child->toArray())) || (is_array($child) && !empty($child)));

        if(!config("view.theme")) {
            return "<li><a href='". url($model["uri"] ?? "") ."'><i class=''></i><span class='title input-lg'>{$model['nama']}</span></a>" . (($level !== 3) ? "" : "</li>");
        }
        else {

            $treeviewClass = $hasChild ? "class=''" : "";
            $arrow = ($hasChild ? "<span class='fa arrow'></span>" : "");
            $closeTag = ($level !== 3) ? "" : "</li>";

            return
                "<li class='".(Request::is($model['uri']) ? "active" : "") ."'>" .
                    "<a href='". (!empty($model["uri"]) ? url($model["uri"]) : "#") . "'>" .
                        "<i class='livicon' data-name='".$model["class"]."' data-c='#67C5DF' data-hc='#67C5DF' data-size='18' data-loop='true'></i>" .
                        "<span class='title'>{$model["nama"]}</span>" .
                        $arrow
                    ."</a>" .
                $closeTag;
        }
    }
}