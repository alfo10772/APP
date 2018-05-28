 //<style>
//*{ margin:0; padding:0}
//.box{ height:50px; width:125px; position:relative}
//.mask{ position:absolute; height:100%; width:100%; top:5; left:0; background:#000; opacity:.3; display:none}
//.sub{ position:absolute;top:5; left:0; padding:20px; color:#fff; font-size:12px; line-height:2; display:none}
//.txtShow .mask,.txtShow .sub{ display:block;}
//</style>


//<script>
window.onload=function(){
var oDiv=document.getElementById('imgBox');

oDiv.onmouseover=function(){
this.className='box txtShow';
};
oDiv.onmouseout=function(){
this.className='box';
}


}
//</script>
//<div id="imgBox" class="box">
//<a href="modif_info.php">
//<img src="../images/photo.png" alt="Photo profil" width="125"></a>
				
    //<div class="mask"></div> 
    //<p class="sub">Changer la photo</p>
