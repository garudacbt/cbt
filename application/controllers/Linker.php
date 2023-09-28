<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
 defined("\x42\x41\123\105\120\101\x54\110") or exit("\116\x6f\x20\144\151\x72\145\x63\164\40\x73\143\162\x69\160\x74\x20\141\x63\143\x65\x73\163\x20\x61\154\154\157\167\x65\144"); class Linker extends CI_Controller { public function __construct() { parent::__construct(); } public function output_json($data, $encode = true) { goto VzJKf; sTBzG: $data = json_encode($data); goto czkyn; czkyn: N7eMn: goto KmmrQ; KmmrQ: $this->output->set_content_type("\x61\160\x70\154\151\143\141\x74\151\x6f\x6e\x2f\152\163\x6f\x6e")->set_output($data); goto JjUVR; VzJKf: if (!$encode) { goto N7eMn; } goto sTBzG; JjUVR: } public function index() { $this->load->view("\154\151\x6e\x6b\x65\162"); } }
