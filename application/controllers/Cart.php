<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function index()
	{
        
        $data = array();
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        // Load the cart view
        $this->load->view('cart/index', $data);
    }
    function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cart/');
    }
    public function del(){
        $this->cart->destroy();
        echo "
			<script type='text/javascript'>
					window.alert('Xóa thành công')
					window.location.href = './'
				</script>
			";
 }

}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */