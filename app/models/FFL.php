
<?php

    class FFL extends Eloquent
    {
		
			/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
		protected $table = 'ffls';
		protected $fillable = ['lic_regn',
							'lic_dist',
							'lic_cnty',
							'lic_type',
							'lic_xprdte',	
							'lic_segn',
							'license_name',
							'business_name',
							'premise_street',
							'premise_city',
							'premise_state',
							'premise_zip_code',
							'mail_street',
							'mail_city',
							'mail_state',
							'mail_zip_code',
							'phone',
							 'user_id'
							];
    }

?>