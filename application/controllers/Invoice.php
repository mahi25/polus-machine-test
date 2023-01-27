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

	public function generateInvoice() {
        $this->load->library('pdf');
        $data = $this->input->post();
        $html = $this->load->view('pdf_view', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
}
