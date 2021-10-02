<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends MY_Controller {
	public function __construct(){
		parent::__construct();
		if (admin() == false) exit(redirect(base_url('admin/auth/logout')));
	}
	public function index() {
		if (role(admin('role_id'), 'view_payment') == false) {
			$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Anda tidak memiliki akses untuk mengunjungi halaman ini.'));
			exit(redirect(base_url('admin')));	
		} 
		// FORM INPUT //
		$field = [
			'id' => 'ID',
			'name' => 'NAMA',
			'code' => 'KODE DISKON',
			'amount' => 'JUMLAH DISKON',
			'has_usage' => 'SUDAH TERPAKAI',
			'usage_limit' => 'LIMIT PEMBELIAN',
			'created_at' => 'TANGGAL / WAKTU',
		];
		$operator = [
			'equal' => 'WHERE =',
			'not_equal' => 'WHERE <>',
			'less_than' => 'WHERE <=',
			'more_than' => 'WHERE >=',
			'like' => 'LIKE %value%'
		];
		// END FORM INPUT //
		// SETTINGS //
		$data_query = [
			'select' => '*',
			'order_by' => 'id DESC',
			'limit' => '30',
			'offset' => ($this->uri->segment(4)) ? $this->uri->segment(4) : 0
		];
		// END SETTINGS //
		// SORT & SEARCH
		if ($this->input->get('sort_field') <> '' AND $this->input->get('sort_type') <> '') {
			if (array_key_exists($this->input->get('sort_field'), $field) == false) exit(redirect(base_url('admin/'.$this->uri->segment(2).'/index')));
			if (in_array($this->input->get('sort_type'), array('asc', 'desc')) == false) exit(redirect(base_url('admin/'.$this->uri->segment(2).'/index')));
			$data_query['order_by'] = $this->input->get('sort_field').' '.$this->input->get('sort_type');
		}
		if ($this->input->get('field') <> '' AND $this->input->get('operator') <> '' AND $this->input->get('value') <> '') {
			if (array_key_exists($this->input->get('field'), $field) == false) exit(redirect(base_url('admin/'.$this->uri->segment(2).'/index')));
			if (array_key_exists($this->input->get('operator'), $operator) == false) exit(redirect(base_url('admin/'.$this->uri->segment(2).'/index')));
			if ($this->input->get('operator') == 'equal') {
				$data_query['where'][] = [$this->input->get('field') => $this->input->get('value')];
			} elseif ($this->input->get('operator') == 'not_equal') {
				$data_query['where'][] = [$this->input->get('field').' <>' => $this->input->get('value')];
			} elseif ($this->input->get('operator') == 'less_than') {
				$data_query['where'][] = [$this->input->get('field').' <=' => $this->input->get('value')];
			} elseif ($this->input->get('operator') == 'more_than') {
				$data_query['where'][] = [$this->input->get('field').' >=' => $this->input->get('value')];
			} else {
				$data_query['where'][] = $this->input->get('field')." LIKE '%".$this->input->get('value')."%'";
			}
		}
		// END SORT & SEARCH
		// PAGINATION //
		if ($this->uri->segment(4) <> '' AND is_numeric($this->uri->segment(4)) == false) exit('No direct script access allowed');
		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$config['base_url'] = base_url('admin/'.$this->uri->segment(2).'/index');
		$config['total_rows'] = $this->discount_model->get_count($data_query);
		$config['per_page'] = $data_query['limit'];
		$this->pagination->initialize($config);
		// END PAGINATION //
		$this->render_admin('admin/'.$this->uri->segment(2).'/index', ['table' => $this->discount_model->get_rows($data_query), 'total_data' => $config['total_rows'], 'field' => $field, 'operator' => $operator]);
	}
	public function form($i = '') {
		$target = $this->discount_model->get_by_id($i);
		if ($target == false) { // add
			if (role(admin('role_id'), 'create_payment') == false) {
				$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Anda tidak memiliki akses untuk mengunjungi halaman ini.'));
				exit(redirect(base_url('admin')));	
			} 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name', 'Nama', 'required|min_length[1]|max_length[100]');
				$this->form_validation->set_rules('code', 'Kode Promo', 'required');
				$this->form_validation->set_rules('discount_type', 'Tipe Diskon', 'required');
				$this->form_validation->set_rules('amount', 'Jumlah Diskon', 'required|numeric');
				$this->form_validation->set_rules('usage_limit', 'Limit Pemakaian', 'required');
				$this->form_validation->set_rules('status', 'Status', 'required');
				$this->form_validation->set_rules('begin_date', 'Tanggal Mulai', 'required');
				$this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'required');
				$this->form_validation->set_rules('min_spend', 'Minimal Nominal Yang Dikeluarkan', 'required');
				$this->form_validation->set_rules('max_discount', 'Maksimal Nominal Diskon', 'required');
				$this->form_validation->set_rules('payment_method', 'Pembayaran Yang Dibolehkan', 'required');
				$this->form_validation->set_rules('new_customer_only', 'Hanya Untuk Pelanggan Baru', 'required');
				if ($this->form_validation->run() == true) {
					$data_input = [
						'name' => $this->db->escape_str($this->input->post('name')),
						'code' => $this->db->escape_str($this->input->post('code')),
						'discount_type' => $this->db->escape_str($this->input->post('discount_type')),
						'amount' => $this->db->escape_str($this->input->post('amount')),
						'usage_limit' => $this->db->escape_str($this->input->post('usage_limit')),
						'status' => $this->db->escape_str($this->input->post('status')),
						'begin_date' => $this->db->escape_str($this->input->post('begin_date')),
						'end_date' => $this->db->escape_str($this->input->post('end_date')),
						'min_spend' => $this->db->escape_str($this->input->post('min_spend')),
						'max_discount' => $this->db->escape_str($this->input->post('max_discount')),
						'payment_method' => $this->db->escape_str($this->input->post('payment_method')),
						'new_customer_only' => $this->db->escape_str($this->input->post('new_customer_only')),
					];
					if ($this->discount_model->get_row(['code' => $data_input['code']])) {
						$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Nama sudah ada didatabase.'));
					} else {
						$insert_data = $this->discount_model->insert($data_input);
						if ($insert_data) {
							$this->session->set_flashdata('result', array('alert' => 'success', 'title' => 'Tambah data berhasil!', 'msg' => 'Data <b>#'.$insert_data.'</b> berhasil ditambahkan.'));
							exit(redirect(base_url('admin/'.$this->uri->segment(2))));
						} else {
							$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Kesalahan tidak terduga.'));
						}
					}
				} else {
					$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => '<br />'.validation_errors()));
				}
			}
			$this->render_admin('admin/'.$this->uri->segment(2).'/add', ['service' => $this->service_model->get_rows(['order_by' => 'name ASC'])]);
		} else { // edit
			if (role(admin('role_id'), 'edit_payment') == false) {
				$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Anda tidak memiliki akses untuk mengunjungi halaman ini.'));
				exit(redirect(base_url('admin')));	
			} 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name', 'Nama', 'required|min_length[1]|max_length[100]');
				$this->form_validation->set_rules('code', 'Kode Promo', 'required');
				$this->form_validation->set_rules('discount_type', 'Tipe Diskon', 'required');
				$this->form_validation->set_rules('amount', 'Jumlah Diskon', 'required|numeric');
				$this->form_validation->set_rules('usage_limit', 'Limit Pemakaian', 'required');
				$this->form_validation->set_rules('status', 'Status', 'required');
				$this->form_validation->set_rules('begin_date', 'Tanggal Mulai', 'required');
				$this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'required');
				$this->form_validation->set_rules('min_spend', 'Minimal Nominal Yang Dikeluarkan', 'required');
				$this->form_validation->set_rules('max_discount', 'Maksimal Nominal Diskon', 'required');
				$this->form_validation->set_rules('payment_method', 'Pembayaran Yang Dibolehkan', 'required');
				$this->form_validation->set_rules('new_customer_only', 'Hanya Untuk Pelanggan Baru', 'required');
				if ($this->form_validation->run() == true) {
					$data_input = [
						'name' => $this->db->escape_str($this->input->post('name')),
						'code' => $this->db->escape_str($this->input->post('code')),
						'discount_type' => $this->db->escape_str($this->input->post('discount_type')),
						'amount' => $this->db->escape_str($this->input->post('amount')),
						'usage_limit' => $this->db->escape_str($this->input->post('usage_limit')),
						'status' => $this->db->escape_str($this->input->post('status')),
						'begin_date' => $this->db->escape_str($this->input->post('begin_date')),
						'end_date' => $this->db->escape_str($this->input->post('end_date')),
						'min_spend' => $this->db->escape_str($this->input->post('min_spend')),
						'max_discount' => $this->db->escape_str($this->input->post('max_discount')),
						'payment_method' => $this->db->escape_str($this->input->post('payment_method')),
						'new_customer_only' => $this->db->escape_str($this->input->post('new_customer_only')),
					];
					if ($data_input['code'] <> $target->code AND $this->discount_model->get_row(['code' => $data_input['code']])) {
						$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Nama sudah ada didatabase.'));
					} else {
						$update_target = $this->discount_model->update($data_input, ['id' => $i]);
						if ($update_target) {
							$this->session->set_flashdata('result', array('alert' => 'success', 'title' => 'Perubahan data berhasil!', 'msg' => 'Data <b>#'.$i.'</b> berhasil diperbaharui.'));
							exit(redirect(base_url('admin/'.$this->uri->segment(2))));
						} else {
							$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Kesalahan tidak terduga.'));
						}
					}
				} else {
					$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => '<br />'.validation_errors()));
				}
			}
			$this->render_admin('admin/'.$this->uri->segment(2).'/edit', ['target' => $target, 'service' => $this->service_model->get_rows()]);
		}
	}
	public function delete($i = '') {
		if (role(admin('role_id'), 'delete_payment') == false) {
			$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Anda tidak memiliki akses untuk mengunjungi halaman ini.'));
			exit(redirect(base_url('admin')));	
		} 
		$target = $this->discount_model->get_by_id($i);
		if ($target == false) show_404();
		$delete_target = $this->discount_model->delete(['id' => $i]);
		if ($delete_target) {
			$this->session->set_flashdata('result', array('alert' => 'success', 'title' => 'Hapus data berhasil!', 'msg' => 'Data <b>#'.$i.'</b> berhasil dihapus.'));
		} else {
			$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Kesalahan tidak terduga.'));
		}
		redirect(base_url('admin/'.$this->uri->segment(2)));
	}
	public function detail($i = '') {
		$target = $this->discount_model->get_by_id($i);
		if ($target == false) show_404();
		$this->load->view('admin/'.$this->uri->segment(2).'/detail', ['target' => $target]);
	}
	public function status($i = '', $status = '') {
		if (role(admin('role_id'), 'edit_payment') == false) {
			$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Anda tidak memiliki akses untuk mengunjungi halaman ini.'));
			exit(redirect(base_url('admin')));	
		} 
		$target = $this->discount_model->get_by_id($i);
		if ($target == false) show_404();
		if (in_array($status, ['0','1']) == false) show_404();
		$update_target = $this->discount_model->update(['status' => $status], ['id' => $i]);
		if ($update_target) {
			$this->session->set_flashdata('result', array('alert' => 'success', 'title' => 'Perubahan status berhasil!', 'msg' => 'Data <b>#'.$i.'</b> berhasil diubah.'));
		} else {
			$this->session->set_flashdata('result', array('alert' => 'danger', 'title' => 'Gagal!', 'msg' => 'Kesalahan tidak terduga.'));
		}
		redirect(base_url('admin/'.$this->uri->segment(2)));
	}
}
