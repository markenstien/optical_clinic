<?php 

    namespace Form;
    use Core\Form;
    load(['Form'],CORE);

    class PaymentForm extends Form {

        public function __construct()
        {
            parent::__construct();

            parent::init([
                'method' => 'post',
                'url'    => _route('payment:create'),
                'enctype' => 'multipart/form-data'
            ]);

            $this->addAmount();
            $this->addMethod();
            $this->addOrg();
            $this->addExternalReference();
            $this->addAccNo();
            $this->addAccName();
            $this->addBillID();
            $this->addFileAttachment();
        }

        public function addAmount() {
            $this->add([
                'type' => 'text',
                'name' => 'amount',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'Amount to pay'
                ]
            ]);
        }

        public function addMethod() {
            $this->add([
                'type' => 'select',
                'name' => 'method',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'Payment Method',
                    'option_values' => [
                        'ONLINE PAYMENT',
                        'ONSITE PAYMENT'
                    ]
                ]
            ]);
        }

        public function addOrg() {
            $this->add([
                'type' => 'text',
                'name' => 'org',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'Organization'
                ]
            ]);
        }

        public function addExternalReference() {
            $this->add([
                'type' => 'text',
                'name' => 'external_reference',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'External Reference'
                ]
            ]);
        }

        public function addAccNo() {
            $this->add([
                'type' => 'text',
                'name' => 'acc_no',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'Account Number'
                ]
            ]);
        }

        public function addAccName() {
            $this->add([
                'type' => 'text',
                'name' => 'acc_name',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'Account Name'
                ]
            ]);
        }

        public function addBillID() {
            $this->add([
                'type' => 'hidden',
                'name' => 'bill_id',
                'class' => 'form-control',
                'required' => true,
                'options' => [
                    'label' => 'Account Name'
                ]
            ]);
        }

        public function addFileAttachment() {
            $this->add([
                'type' => 'file',
                'name' => 'file_attachment',
                'options' => [
                    'label' => 'Payment Attachment Photo'
                ],
                'required' => true
            ]);
        }
    }