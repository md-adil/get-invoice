  <label>
    <input style="display: none" type="file" accept="image/*" onchange="loadFile(event)">
    <img id="output" src="data:image/png;base64,<?= base64_encode(file_get_contents('img/download.png')) ?>" />
  </label>
<script type="text/javascript">

document.getElementById('output').addEventListener('click', function() {
  var files = document.getElementById('file').files;
  if (files.length > 0) {
    getBase64(files[0]);
  }
});

function getBase64(file, fn) {
   var reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = function () {
    fn(reader.result);
   };
   reader.onerror = function (error) {
     console.log('Error: ', error);
   };
}
var loadFile = function(event) {
      var output = document.getElementById('output');
      getBase64(event.target.files[0],function(img) {
        output.src = img;
      });
      // output.src = URL.createObjectURL();
  };
    $('.bnt-submit').click(function(e) {
        var $frm = $('.get-pdf');
        $('<input />', {name:'pdf', type:'hidden'}).val($('#form1').html()).appendTo($frm);
        $frm.get(0).submit();
    });

</script>
