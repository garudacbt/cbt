<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
 defined("\102\101\123\x45\120\x41\x54\x48") or exit("\x4e\x6f\40\x64\x69\x72\x65\x63\164\x20\163\x63\x72\151\160\x74\x20\x61\143\143\x65\163\163\40\x61\154\x6c\x6f\167\145\x64"); class Linker extends CI_Controller { public function __construct() { parent::__construct(); } public function output_json($data, $encode = true) { goto wJBH2; XHRAH: JFb08: goto XX5Kj; XX5Kj: $this->output->set_content_type("\141\x70\x70\x6c\151\x63\141\x74\x69\157\x6e\x2f\x6a\163\157\156")->set_output($data); goto fl2tX; wJBH2: if (!$encode) { goto JFb08; } goto worqn; worqn: $data = json_encode($data); goto XHRAH; fl2tX: } public function index() { $this->load->view("\154\x69\x6e\x6b\x65\x72"); } }
