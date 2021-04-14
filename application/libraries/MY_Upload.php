<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/10/20
 * Time: 18:09
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * File Uploading Class Extension
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Uploads
 * @author      Harrison Emmanuel (Eharry.me)
 * @link        https://www.eharry.me/blog/post/my-codeigniter-upload-extension/
 */
class MY_Upload extends CI_Upload {

	/**
	 * Validate Upload Path
	 *
	 * Verifies that it is a valid upload path with proper permissions.
	 *
	 * @return  bool
	 */
	public function validate_upload_path() {
		if ($this->upload_path === '') {
			$this->set_error('upload_no_filepath', 'error');
			return FALSE;
		}

		if (realpath($this->upload_path) !== FALSE) {
			$this->upload_path = str_replace('\\', '/', realpath($this->upload_path));
		}

		if (!is_dir($this->upload_path)) {
			// EDIT: make directory and try again
			if (!mkdir($this->upload_path, 0777, TRUE)) {
				$this->set_error('upload_no_filepath', 'error');
				return FALSE;
			}
		}

		if (!is_really_writable($this->upload_path)) {
			// EDIT: change directory mode
			if (!chmod($this->upload_path, 0777)) {
				$this->set_error('upload_not_writable', 'error');
				return FALSE;
			}
		}

		$this->upload_path = preg_replace('/(.+?)\/*$/', '\\1/', $this->upload_path);
		return TRUE;
	}
}
