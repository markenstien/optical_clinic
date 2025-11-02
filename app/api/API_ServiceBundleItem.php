<?php 

    class API_ServiceBundleItem extends Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->serviceBundleItemModel = model('ServiceBundleItemModel');
        }

        public function updateItemQuantityPerUsage() {
            $post = request()->posts();

            if($post['quantity'] < 1) {
                ee(api_response([
                    'payload' => $post,
                    'message' => 'Update not allowed'
                ]));
                return;
            }
            $resp = $this->serviceBundleItemModel->updateItemQuantityPerUsage(...[
                $post['id'],
                $post['quantity']
            ]);

            ee(api_response([
                'response' => $resp,
                'payload' => $post,
                'message' => 'Quantity Per Usage Updated'
            ]));

        }
    }