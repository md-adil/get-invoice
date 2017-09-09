<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .shadow-container {
            box-shadow: 1px 1px 5px rgba(0,0,0, .64);
        }
    </style>
</head>

<body>
<div class="container shadow-container">
    <div class="row">
        <div class="col-md-12">
            <form id="pdf-content">
                <style><?= file_get_contents('css/pdf.css') ?></style>
                 <div class="top">
                    <h1>Declaration Letter </h1>
                     <div class="image-upload">
                       <label for="file-input">
                           <img id="output" src="data:image/png;base64,<?= base64_encode(file_get_contents('download.png')) ?>" />
                       </label>
                       <input id="file-input" type="file" accept="image/*" onchange="loadFile(event)">
                     </div>  
                </div>
                
                <header>
                    <address contenteditable>
                        <h2>Company<br>Name</h2>
                    </address>
                </header>
            
                <article>
                    <h2>TO WHOMSOVER IT MAY CONCERN</h2>
                        <div class= "content">
                            <p>I <span contenteditable>"Alison"</span> declare that the brand <span contenteditable>"FRNDZ"</span> is owned and manufacturer by <span contenteditable> "Acme Corporation"</span>. We take the responsibility on any brand conflict that may arise.</p>
                            <br>
            
                            <div contenteditable>
                                <p>Additional lines </p>
                            </div>
            
                        </div>
                         <div class="footer">
                                <p><span contenteditable>Regards,</span>
                                </p>
                                <p><span contenteditable>Alison</span>
                                </p>
                                <p><span contenteditable>Proprietors</span>
                                </p>
                                <p><span contenteditable>123 6th St.</span>
                                </p>
                                <p><span contenteditable>Melbourne, FL 32904</span>
                                </p>
                        </div>            
                </article>
              
            </form>
        </div>
    </div>
            
</div>
<div class="container"><div class="action">
        <p> <span onclick="print()">Print</span> <!-- | <span id="cmd" class="link-print"><a href="javascript:demoFromHTML()" class="button">Get PDF</a> --></span>
        <form action="index.php" class="get-pdf" method="post">
            <a data-toggle="modal" data-target="#userform-modal">getpdf</a>
        </form>
        </p>
     </div>
</div>

<div id="editor"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
"></script>
<script type="text/javascript">
    
    $(function () {

    var specialElementHandlers = {
        '#editor': function (element,renderer) {
            return true;
        }
    };
 $('#cmd').click(function () {
        var doc = new jsPDF();
        doc.fromHTML($('#target').html(), 15, 15, {
            'width': 170,'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });  
});

var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    $('.bnt-submit').click(function(e) {
        var $frm = $('.get-pdf');
        $('<input />', {name:'pdf', type:'hidden'}).val($('#form1').html()).appendTo($frm);
        $frm.get(0).submit();
    });
</script>


 <div class="modal fade" id="userform-modal">
     <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <form action="index.php" method="post">
                            <input type="hidden" name="content">
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
     </div>
 </div>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
 <script>
     $('#userform-modal').on('shown.bs.modal', function() {
        $('[name=content]').val($('#pdf-content').html());
     });
 </script>
</body>
</html>