
<?php

    class Comment extends Eloquent
    {
		function getUsername(){
			if(!empty($this->user_id)){
				return DB::table('users')->where('id', $this->user_id)->pluck('name');
			}
			return 'Anonymous';
		}
		
		function getFFLname(){
			if(!empty($this->user_id)){
				return DB::table('ffls')->where('id', $this->ffl_id)->pluck('business_name');
			}
			return 'Name Not Found';
		}
    }

?>