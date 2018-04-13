<?php
    class CongressMember {
        public $id = '';
        public $title = '';
        public $first_name = '';
        public $last_name = '';
        public $party = '';
        public $govtrack_id = '';
        public $cspan_id = '';
        public $votesmart_id = '';
        public $icpsr_id = '';
        public $crp_id = '';
        public $google_entity_id = '';
        public $fec_candidate_id = '';
        public $url = '';
        public $office = '';
        public $phone = '';
        public $state = '';
        public $district = '';
        public $geoid = '';
        public $votes_with_party_pct = '';

        public function getImage() {
            return $this->id;
        }

        public function getName() {
          return $this->first_name . ' ' . $this->last_name;
        }

    }
?>
