<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
    // get the HTML
    ob_start();
    $num = 'CMD01-'.date('ymd');
    $nom = 'DUPONT Alphonse';
    $date = '01/01/2020';
?>
<style type="text/css">

    div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #333; font-size: 12mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 6mm; position: relative; }

</style>
<page format="LETTER" orientation="L" style="font: arial;">
    <div style="width:200mm; height:100mm; background-color: #ccc; top:30mm; left: 40mm; position: absolute;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: 196mm; top: 10mm; font-style: italic; font-weight: normal; text-align: center; font-size: 3mm;">
        Event Powered by www.etickets.ph
    </div>
    <table style="width: 100%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="2" style="width: 100%">
                <div class="zone" style="height: 34mm;position: relative;font-size: 5mm;">
                    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
                    <tr>
                        <td style="width: 74%;">

                    <h2>SUPERCONFERENCE 2014: Angels Of Abundance</h2>
                    
                    <h2>Ticket Type</h2><br>
                    <h1>Abdulcaliph Tiblani</h1>


                    
                        </td>
                        <td style="width: 15%;">
                            <img src="./res/etickets-icon.jpg" alt="logo" style="margin-top: 3mm;">        
                        </td>
                    </tr>
                    </table>
                    </div>
                    
                
                    
                
            </td>
        </tr>
        <tr>
            <td style="width: 25%;">
                <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
                    <qrcode value="<?php echo $num."\n".$nom."\n".$date; ?>" ec="Q" style="width: 37mm; border: none;" ></qrcode>
                </div>
            </td>
            <td style="width: 75%">
                <div class="zone" style="height: 40mm;vertical-align: top;">
                    <p style="font-size: 16pt"><b>01/01/2020 | 10:30 PM</b><br>CCP Complex, Roxas Boulevard
Metro Manila, Philippines 1307<br>
                        Order Date<br>
                    </p>
                </div>
            </td>
        </tr>
    </table>
</div>
</page>
<?php
     $content = ob_get_clean();

    // convert
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('ticket.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

