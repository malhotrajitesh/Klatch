<?php

return [
    'userManagement'    => [
        'title'          => 'User Management',
        'title_singular' => 'User Management',
    ],
    'permission'        => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created At',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'role'              => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created At',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'              => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
               'mobile'                 => 'Mobile',
            'mobile_helper'          => '',
            'area'            => 'Area',
            'area_helper'     => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'expenseManagement' => [
        'title'          => 'Expense Management',
        'title_singular' => 'Expense Management',
    ],
    'expenseCategory'   => [
        'title'          => 'Expense Categories',
        'title_singular' => 'Expense Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created At',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
        ],
    ],
    'incomeCategory'    => [
        'title'          => 'Income Categories',
        'title_singular' => 'Income Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
        ],
    ],
    'expense'           => [
        'title'          => 'Expenses',
        'title_singular' => 'Expense',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'expense_category'        => 'Expense Category',
            'expense_category_helper' => '',
            'entry_date'              => 'Entry Date',
            'entry_date_helper'       => '',
            'amount'                  => 'Amount',
            'amount_helper'           => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'created_at'              => 'Created At',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => '',
            'created_by'              => 'Created By',
            'created_by_helper'       => '',
        ],
    ],
    'income'            => [
        'title'          => 'Income',
        'title_singular' => 'Income',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'income_category'        => 'Income Category',
            'income_category_helper' => '',
            'entry_date'             => 'Entry Date',
            'entry_date_helper'      => '',
            'amount'                 => 'Amount',
            'amount_helper'          => '',
            'description'            => 'Description',
            'description_helper'     => '',
            'created_at'             => 'Created At',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],
    'expenseReport'     => [
        'title'          => 'Monthly report',
        'title_singular' => 'Monthly report',
        'reports'        => [
            'title'             => 'Reports',
            'title_singular'    => 'Report',
            'incomeReport'      => 'Incomes report',
            'incomeByCategory'  => 'Income by category',
            'expenseByCategory' => 'Expense by category',
            'income'            => 'Income',
            'expense'           => 'Expense',
            'profit'            => 'Profit',
        ],
    ],

       'distributer'            => [
        'title'          => 'Distributer',
        'title_singular' => 'Distributer',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
             'salesman_id'            => 'Select Salesman',
            'salesman_id_helper'     => '',
            'name'        => 'Name',
            'name_helper' => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'mobile'                 => 'Mobile',
            'mobile_helper'          => '',
            'area'            => 'Area',
            'area_helper'     => '',
             'cpname'        => 'Contact Person Name',
            'cpname_helper' => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],


       'dealer'            => [
        'title'          => 'Dealer',
        'title_singular' => 'Dealer',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
             'salesman_id'            => 'Salesman',
            'salesman_id_helper'     => '',
             'distributer_id'            => 'Distributer',
            'distributer_id_helper'     => '',
            'name'        => 'Name',
            'name_helper' => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'mobile'                 => 'Mobile',
            'mobile_helper'          => '',
            'area'            => 'Area',
            'area_helper'     => '',
             
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],


       'scheme'            => [
        'title'          => 'Sale Scheme',
        'title_singular' => 'Sale Scheme',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'name'        => 'Name',
            'name_helper' => '',
            'weight'             => 'Weight',
            'weight_helper'      => '',
            'fweight'                 => 'Free Weight',
            'fweight_helper'          => '',
            'valid_from'            => 'Valid From',
            'valid_from_helper'     => '',
            'valid_to'            => 'Valid To',
            'valid_to_helper'     => '',
             'remark'        => 'Remarks',
            'remark_helper' => '',
            

             
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

  'sassign'            => [
        'title'          => 'Scheme Assign',
        'title_singular' => 'Salesman Assign',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
             'salesman_id'            => 'Salesman',
            'salesman_id_helper'     => '',
             'scheme_id'            => 'Schme',
            'scheme_id_helper'     => '',
            'sweight'        => 'Total Scheme',
            'sweight_helper' => '',
            'bal'             => 'Balance Scheme',
            'bal_helper'      => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

       'dassign'            => [
        'title'          => 'Distributer Assign',
        'title_singular' => 'Distributer Assign',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
             'salesman_id'            => 'Salesman',
            'salesman_id_helper'     => '',
             'scheme_id'            => 'Scheme',
            'scheme_id_helper'     => '',
            'distributer_id'       => 'Distributer',
            'distributer_id_helper'     => '',
            'dweight'        => 'Total Scheme',
            'dweight_helper' => '',
            'dbal'             => 'Balance Weight',
            'dbal_helper'      => '',
             'dfree'             => 'Balance Free Weight',
            'dfree_helper'      => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],


       'sale'            => [
        'title'          => 'Sales',
        'title_singular' => 'Add Sales',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
             'salesman_id'            => 'Salesman',
            'salesman_id_helper'     => '',
             'distributer_id'            => 'Distributer',
            'distributer_id_helper'     => '',
            'scheme_id'        => 'Scheme',
            'scheme_id_helper' => '',
            'dealer'             => 'Dealer',
            'dealer_id_helper'      => '',
            'billno'                 => 'Bill No.',
            'billno_helper'          => '',
            'billdate'            => 'Bill Date',
            'billdate_helper'     => '',
            'oweight'             => 'Bill Weight',
            'oweight_helper'      => '',
            'ofweight'                 => 'Free Weight',
            'ofweight_helper'          => '',
            
             
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

 'cledger'    => [
        'title'          => 'Common Ledger',
        'title_singular' => 'Common Ledger',
    ],

    'sledger'    => [
        'title'          => 'Salesman  Ledger',
        'title_singular' => 'Salesman Ledger',
    ],

 'dledger'    => [
        'title'          => 'Distributer  Ledger',
        'title_singular' => 'Distributer Ledger',
    ],

'schledger'    => [
        'title'          => 'Scheme  Ledger',
        'title_singular' => 'Scheme Ledger',
    ],

     'store'    => [
        'title'          => 'Manfacturing Unit',
        'title_singular' => 'Manfacturing Unit',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
        ],
    ],

 'bill'            => [
        'title'          => 'Gate Entry',
        'title_singular' => 'Gate Entry',
        'fields'         => [

   
  
            'id'                     => 'ID',
            'id_helper'              => '',
            'store_id'        => 'Manfacturing Unit',
            'store_id _helper' => '',
            'entry_date'             => 'Bill Date',
            'entry_date_helper'      => '',
             'in_billno'            => 'Bill Number',
            'in_billno_helper'     => '',
             'in_pname'            => 'Party Name',
            'in_pname_helper'     => '',
             'in_city'            => 'City',
            'in_city_helper'     => '',
             'in_product_name'            => 'Product Name',
            'in_product_name_helper'     => '',
               'in_quantity'            => 'Quantity(in kg)',
            'in_quantity_helper'     => '',
            'in_amount'                 => 'Amount',
            'in_amount_helper'          => '',
            'in_vnumber'            => 'Vehicle Number',
            'in_vnumber_helper'     => '',
             'in_grnumber'            => 'GR Number',
            'in_grnumber_helper'     => '',
             'in_frieght'            => 'Freight',
            'in_frieght_helper'     => '',
             'in_bill_image'            => 'Bill Image Upload',
            'in_bill_image_helper'     => '',
              'in_driver_image'            => 'Driver Image Upload',
            'in_driver_image_helper'     => '',
             'handover_by_id'            => 'Select Handover Person',
            'handover_by_id '     => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

    'superviser'    => [
        'title'          => 'Superviser',
        'title_singular' => 'Superviser',
    ],


    'forman'    => [
        'title'          => 'Forman',
        'title_singular' => 'Forman',
    ],


  'verifier'            => [
        'title'          => 'Stock Verifier',
        'title_singular' => 'Stock Verifier',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
             'pname'            => 'Product Name',
            'pname_helper'     => '',
             'quantity'            => 'Quantity',
            'quantity_helper'     => '',
            'verify'        => 'verify',
            'verify' => '',
            'remark'             => 'Remark',
            'remark'      => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

  'sfproduct'    => [
        'title'          => 'Semi Finished Product',
        'title_singular' => 'Semi Finished Product',
    ],


    'bom'    => [
        'title'          => 'Bill Of Material',
        'title_singular' => 'Bill Of Material',
    ],
  
 'rawpro'    => [
        'title'          => 'Raw Product',
        'title_singular' => 'Raw Product',
    ],


 'company'            => [
        'title'          => 'Company',
        'title_singular' => 'Company',
        'fields'         => [

   
  
            'id'                     => 'ID',
            'id_helper'              => '',
            'name'        => 'Name',
            'name_helper' => '',
            'logo'             => 'Logo',
            'logo_helper'      => '',
             'cid'            => 'Co. ID',
            'cid_helper'     => '',
             'gst'            => 'GSTIN',
            'gst_helper'     => '',
             'invoice'            => 'Invoice Code',
            'invoice_helper'     => '',
             'address'            => 'Address',
            'address_helper'     => '',
               'pincode'            => 'Pin Code',
            'pincode_helper'     => '',
            'city'                 => 'City',
            'city_helper'          => '',
            'state'            => 'State',
            'state_helper'     => '',
             'country'            => 'Country',
            'country_helper'     => '',
             'contact_no'            => 'Contact #',
            'contact_no_helper'     => '',
             'alt_no'            => 'Alternate #',
            'alt_no_helper'     => '',
              'ref_no'            => 'Ref Contact #',
            'ref_no_helper'     => '',
             'email'            => 'Email ID',
            'email_helper'     => '',
             'date'            => 'Date',
            'date_helper'     => '',
            'created_at'             => 'Created At',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

     'party'            => [
        'title'          => 'Party',
        'title_singular' => 'Party',
        'fields'         => [

   
  
            'id'                     => 'ID',
            'id_helper'              => '',
            'name'        => 'Party Name',
            'name_helper' => '',
            'logo'             => 'Party Logo',
            'logo_helper'      => '',
             'coname'            => 'Contact Name',
            'coname_helper'     => '',
             'gst'            => 'Gst Id',
            'gst_helper'     => '',
             'website'            => 'Website',
            'website_helper'     => '',
             'address'            => 'Address',
            'address_helper'     => '',
               'pincode'            => 'Pincode',
            'pincode_helper'     => '',
             'contact_no'            => 'Contact No',
            'contact_no_helper'     => '',
            'city'                 => 'City',
            'city_helper'          => '',
            'state'            => 'State',
            'state_helper'     => '',
             'country'            => 'Country',
            'country_helper'     => '',

              'area'            => 'Area',
            'area_helper'     => '',
             'status'            => 'Status',
            'status_helper'     => '',
             'email'            => 'Email Id',
            'email_helper'     => '',
             'date'            => 'Date',
            'date_helper'     => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
            'created_by'             => 'Created By',
            'created_by_helper'      => '',
        ],
    ],

     
];


