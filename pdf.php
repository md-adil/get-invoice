<?php ob_start() ?>
<style><?= file_get_contents('output.css') ?></style>
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

<?php

$contents = ob_get_contents();
ob_clean();
require 'vendor/autoload.php';
require 'pdfcrowd.php';
require 'Mailer.php';

// create an API client instance
$client = new Pdfcrowd("kamna", "5598da22b8d1da175ac42ae15bdb61f6");
$pdf = $client->convertHtml($contents);

Mailer::instance()->attach($pdf, 'Hello World.pdf')->send('adil@biglytech.net');

header("Content-Type: Application/pdf");

echo $pdf;

