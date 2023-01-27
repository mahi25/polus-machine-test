<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Load generate invoice view file
	 */
	public function index()
	{
		$this->load->view('generate_invoice');
	}

	//function to handle the submit and give a pdf preview
	public function generateInvoice() {
        $this->load->library('pdf');
        $data['names'] = $this->input->post('name');
        $data['quantity'] = $this->input->post('quantity');
        $data['tax'] = $this->input->post('tax');
        $data['price'] = $this->input->post('price');
        $data['itemTotal'] = $this->input->post('itemTotalActual');
        $data['discount'] = $this->input->post('discount');
        $data['totalAmt'] = $this->input->post('totalAmt');
        $html = $this->load->view('pdf_view', $data, true);
        $this->pdf->createPDF($html, 'invoice', false);
    }
}
