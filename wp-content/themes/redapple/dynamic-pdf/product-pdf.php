<?php

use BinaryIT\Invoice\PDF;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// $font_path = __DIR__ . '/Montserrat-Regular.ttf';
// $fontname = $pdf->covertFont($font_path);


/**
 * Register Wordpress Form Action
 * */
add_action('admin_post_nopriv_print_product_info', 'print_product_info');
add_action('admin_post_print_product_info', 'print_product_info');
function print_product_info()
{
	$product_id = $_POST['product_id'] ?? '';
	$crzf_header_logo = $_POST['crzf_header'] ?? '';
	$product_title = $_POST['product_title'] ?? '';
	$crzf_product_url = $_POST['crzf_product_url'] ?? '';
	$line_bar = $_POST['line_bar'] ?? '';

	$spp_large_title = get_post_meta($product_id, 'spp_large_title', true);
	$spp_description = get_post_meta($product_id, 'spp_description', true);
	$crzf_pn_description_two = get_post_meta($product_id, 'crzf_pn_description_two', true);
	$crsd_short_description = get_post_meta($product_id, 'crzf_descriptive_product_name', true);

	$spp_sectr_upload_pdf_file = get_post_meta($product_id, 'spp_sectr_upload_pdf_file', true);
	$spp_sectr_upload_pdf_file_url = wp_get_attachment_image_url($spp_sectr_upload_pdf_file, 'full');

	$spp_slider_image = get_post_meta($product_id, 'spp_slider_image', true);
	for ($i = 0; $i < $spp_slider_image; $i++) {
		if (0 == $i) {
			$sppssimg_slider_image = get_post_meta($product_id, 'spp_slider_image_' . $i . '_sppssimg_slider_image', true);
			$sppssimg_slider_image_url = wp_get_attachment_image_url($sppssimg_slider_image, 'full');
		}
	}

	$spp_product_data = get_post_meta($product_id, 'spp_product_data', true);
	$spp_secfr_accessori_data = get_post_meta($product_id, 'spp_secfr_accessori_data', true);
	$h_applicazioni_list = get_post_meta($product_id, 'h_applicazioni_list', true);




?>
<?php
	$pdf = new PDF();
	
	// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 45, PDF_MARGIN_RIGHT);
	// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM+7);

	
	// 	$header = <<<DOC
	// 	<table>
	//     <tr>
	//         <td style="width: 73%; margin: auto;"> 
	//             <h1 style="font-family: montserrat;  text-transform:uppercase; font-size: 20px; color:#007656; line-height: 12px">Name</h1>
	//         </td>
	//         <td style="text-align:right; width: 26%">
	//            image
	//         </td>
	//     </tr>
	// </table>
	// DOC;


	$footer = <<<DOC
	<table >
	<tr>
		<td style="width: 5%;"></td>
		<td style="width: 20%; ">
			<img style="height: 350px" src="{$crzf_header_logo}" alt="">
		</td>
		<td style="width: 70%; text-align: right; font-size: 13px; font-family: helvetica; ">
		<span>Crizaf S.r..<br>Via E. H. Grieg, 15 - 21047 Saronno (VA) Italy - T. +39 02 9619951 - F. +39 02 96199536 <br>  info@crizar.eu - <b style="font-family: helvetica; ">www.crizaf.com</b> </span>
		</td>
		<td style="width: 5%;"></td>
	</tr>
</table>

DOC;
	// $pdf->headerHTML($header);
	$pdf->footerHTML($footer);

	$pdf->AddPage();
	$html = '';

	$html .= <<<DOC
<table> 
	<tr>
	<td style="width: 5%;"></td>
	<td style="line-height: 35px; width: 90%; text-transform: uppercase; font-family: montserratb; font-size: 80px; color: #484848 ">{$product_title}
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
<table  style="line-height: 18px; "> 
	<tr>
	<td style="width: 5%;"></td>
	<td style="width: 30%;">
	<img style="width: 250px; line-height: 80px;" src="{$line_bar}" alt="">
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
DOC;



	$html .= <<<DOC
<table style="background-color: #e5e5e5;"> 
	<tr style="">
	<td style="width: 5%;"></td>
	<td style="width: 40%; font-family: montserrat; font-size: 20px; ">
	<br>
	<br>
	{$crsd_short_description}
	</td>
	<td style="width: 50%; text-align: center;  line-height: -250px;">
		<img style="height: 320px; margin-top: 900px " src="{$crzf_product_url}" alt="">
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
<br>
<br>
<br>
<br>
DOC;


	// <img style="height: 350px" src="http://localhost:1010/crizaf/wp-content/uploads/2022/02/P2500_crizaf.png" alt="">
	$html .= <<<DOC
	
<table>
	<tr style="">
	<td style="width: 5%; "></td>
	<td style="width: 90%; font-family: montserratb; line-height: 20px;  font-size: 18px; color: #484848 ">
		<h1>{$spp_large_title}</h1>
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
<br>
<br>
<table >
	<tr>
	<td style="width: 5%;"></td>
	<td style="width: 44%;">
		<p style="font-family: montserrat; font-size: 12px; line-height: 16px;">{$spp_description}</p>
	</td>
	<td style="width: 2%;"></td>
	<td style="width: 44%;">
	<p style="font-family: montserrat; font-size: 12px; line-height: 16px;">{$crzf_pn_description_two}</p>
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>

DOC;

	$html .= <<<DOC
	<br>
	<br>
	<br>
<table style="">
	<tr>
	<td style="width: 5%;"></td>
	<td style="width: 90%;">
		<img style="height: 450px;" src="{$sppssimg_slider_image_url}" alt="">
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
DOC;


	$html .= <<<DOC
	<br>
	<br>
	<br>
<table>
	<tr>
	<td style="width: 5%;"></td>
	<td style="width: 90%;">
		<h2 style="font-family: montserratb; font-size: 18px; color: #484848; ">01. Specifiche tecniche standard</h2>
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
<br>
<br>
<br>
DOC;

	$html .= <<<DOC
<table cellpadding="10">
DOC;

	for ($i = 0; $i < $spp_product_data; $i++) {
		$bgc = '';
		if ($i % 2 != 0) {
			$bgc = '#e6e6e6';
		}
		$spp_first_column_data = get_post_meta($product_id, 'spp_product_data_' . $i . '_spp_first_column_data', true);
		$sppsnd_first_column_data = get_post_meta($product_id, 'spp_product_data_' . $i . '_sppsnd_first_column_data', true);


		$html .= '<tr style="font-family: montserrat; font-size: 14px;">';
		$html .= '<td style="width: 5%;"></td>';

		$html .= '<td style="background-color: ' . $bgc . '; width: 30%;">';
		$html .= '<span>' . $spp_first_column_data . '</span>';
		$html .= '</td>';

		$html .= '<td style="background-color: ' . $bgc . '; width: 60%;">';
		$html .=  $sppsnd_first_column_data;
		$html .= '</td>';

		$html .= '<td style="width: 5%;"></td>';
		$html .= '</tr>';

		// end tr 

	}



	$html .= <<<DOC
</table>
DOC;

// <p  style="page-break-after: always;"></p>
	$html .= <<<DOC
<br>
<br>
<br>
<br>
<table>
	<tr>
	<td style="width: 5%;"></td>
	<td style="width: 90%;">
		<h2 style="font-family: montserratb; font-size: 18px; color: #484848; ">02. Disegno tecnico	</h2>
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
<br>
<br>
DOC;

	$html .= <<<DOC
<table>
	<tr>
	<td style="width: 5%;"></td>
	<td style="width: 90%;">
		<img style="height: 350px" src="{$spp_sectr_upload_pdf_file_url}" alt="">
		
	</td>
	<td style="width: 5%;"></td>
	</tr>
</table>
DOC;


	$pdf->writeHTML($html);
	/**
	 * @param string filename
	 * @param string mode (I/D/F/S/FI/FD/E)
	 * 			I: show PDF in brower
	 * 			D: Download pdf
	 * 			F: Store in server
	 * 			S: return as string, recommended for sending mail attachment
	 * 			FI: F + I
	 * 			FD: F + D
	 * 			E: return the document as base64 mime multi-part email attachment
	 */

	$file_name =  $product_title . '_Scheda_Prodotto' . '.pdf';
	// ob_end_clean();
	$pdf->Output($file_name, 'D');
	
// 	$membership_card = $pdf->Output('membership_card.pdf', 'S');
	
    $mail = new PHPMailer();
    try {
        //Email Configeration
        $mail->Host = 'modelvela_tesseramento@modelvela.com';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->Username = 'modelvela_tesseramento@modelvela.com';
        $mail->Password = 'modelvela_tesseramento';

        // 		$mail->isSMTP();
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;   //enable dubuging            

        //Recipients
        $mail->setFrom('modelvela_tesseramento@modelvela.com', ' ');
        $mail->addAddress($email);

        //Attachments
        $mail->addStringAttachment($membership_card, 'membership_card.pdf');

        // $msg= $membership_card;



        mail();

        //Content
        $mail->isHTML(true);                  //Set email format to HTML
        $mail->CharSet = "utf-8";
        $mail->Subject      = 'Tessera Associativa ModelVela';
        $mail->Body         = $mod_message;
        // $mail->AltBody      = strip_tags($mail->Body);
        $mail->send();

        die;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    die;
}
