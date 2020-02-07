<!--
var xmlhttp;

/*barang*/
function barang(id_kategori)
{
 document.getElementById("detail").innerHTML="";
 if(id_kategori=="")
 {
  alert("Anda Belum Memilih Kategori");
  document.getElementById("kategori").focus();
  document.getElementById("barang").innerHTML="";
  return false;
 }
 else
 {
  var url="barang.php?rand="+Math.random();
  var post="id_kategori="+id_kategori;
  ajax(url,post,'barang');
 }
}
/*--------*/

/*detail*/
function detail(id_barang)
{
 if(id_barang=="")
 {
  alert("Anda Belum Memilih Barang");
  document.getElementById("barang").focus();
  document.getElementById("detail").innerHTML="";
  return false;
 }
 else
 {
  var url="detail.php?rand="+Math.random();
  var post="id_barang="+id_barang;
  ajax(url,post,'');
 }
}
/*--------*/

/**Ajax**/
/*out_response*/
function out_response(response)
{
 if(response=="barang")
 {document.getElementById("barang").innerHTML=xmlhttp.responseText;}
 else
 {document.getElementById("detail").innerHTML=xmlhttp.responseText;}
}
/*--------*/

/*ajax*/
function ajax(url,post,response)
{
 xmlhttp=GetXmlHttpObject();
 xmlhttp.onreadystatechange=function()
 {
  if(xmlhttp.readyState==4)
  {
   if(xmlhttp.status==200)
   {
    out_response(response);
   }
   else{ajax_fail();}
  }
 }
 xmlhttp.open("POST",url,true);
 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xmlhttp.send(post);
}
/*--------*/

/*ajax_fail*/
function ajax_fail()
{
 alert("Maaf ada gangguan penerimaan data, silahkan coba lagi atau refresh browser anda.");
 return false;
}
/*--------*/

/*pilih xmlhttp berdasarkan browser*/
function GetXmlHttpObject()
{
 if(window.XMLHttpRequest)
 {
  return new XMLHttpRequest();
 }
 if(window.ActiveXObject)
 {
  return new ActiveXObject("Microsoft.XMLHTTP");
 }
 else
 {alert("Maaf browser anda tidak mendukung ajax.");}
 return false;
}
/*--------*/
/**--------**/
//-->