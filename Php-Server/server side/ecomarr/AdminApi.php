<?php
include "conn.php";

class Request
{
    public $message;
    public $status;
}

function errorHelp()
{
    $response = new Request();
    $response->message = "Invalid Token Requested";
    $response->status = "-1";
    echo json_encode($response);
}

//  FUNCTIONS FOR THE SELECTED TOKEN....
function userLogin($data)
{
    global $conn;
    $data = json_decode($data);
    $email = $data->u_email;
    $password = $data->u_password;
  

    class LoginRequest
    {
        public $status;
        public $message;
        public $email;
        public $u_id;
    }

    $sql = "SELECT * FROM user_ecom WHERE u_email='$email' and u_password='$password'";
    $result = $conn->query($sql);

    $lr = new LoginRequest();

    if($result->num_rows > 0)
    {
        $row=$result->fetch_assoc();
        $lr->status = "1";
        $lr->message = "Login successful";
        $lr->email=$row['u_email'];
        $lr->u_id=$row['u_id'];
    }
    else
    {
        $lr->status = "-1";
        $lr->message = "Login un-successful";
    }

    echo  json_encode($lr);
}

function category()
{
    global $conn;
    
    class CategoryRequest
    {
        public $message;
        public $status;
        public $listFetched;
    }

    $sql = " SELECT * from category_ecom WHERE c_status = '1' ";
    $result = $conn->query($sql);

    $cr = new CategoryRequest(); 

    if($result->num_rows > 0)
    {
            

            while($row = $result->fetch_assoc())
            {
                $cList[] = array(
                                   "c_id"=>$row["c_id"],
                                   "c_name"=>$row["c_name"],
                                   "c_desc"=>$row["c_desc"],
                                   "c_date"=>$row["c_date"],
                                   "c_image"=>$row["c_image"]
                                          
                                );
            }

            $cr->message = "category list are fetched successfully";
            $cr->status = "1";
            $cr->listFetched = $cList;
    }
    else
    {
        $cr->status = "-1";
        $cr->message = "No category found";
        $cr->listFetched = array();
    }
    
    echo json_encode($cr);
}


function subCategory($data)
{
    global $conn;

    $data=json_decode($data);

   $cate_id=$data->cat_id;



    class SubCategoryRequest
    {
        public $message;
        public $status;
        public $listFetched;
    }

    $sql = "SELECT * FROM sub_category_ecom WHERE c_id='$cate_id'";
    $result = $conn->query($sql);

    $obj = new SubCategoryRequest();

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $listdata[] = array(
                                    "s_c_id"    =>$row["s_c_id"],
                                    "s_c_name"  =>$row["s_c_name"],
                                    "s_c_pic"   =>$row["s_c_pic"],
                                    "s_c_desc"   =>$row["s_c_desc"]
                                    
                                );
        }

        $obj->message="sub category found successfully";
        $obj->status="1";
        $obj->listFetched=$listdata;

    }
    else
    {
        $obj->message="sub category not found ";
        $obj->status="-1";
        $obj->listFetched=array();
    }

    echo json_encode($obj);
}


function userRegister($data)
{
    global $conn;

    $registerData = json_decode($data);

    $u_email      = $registerData->u_email;
    $u_password   = $registerData->u_password;

    date_default_timezone_set('Asia/Kolkata');
    $today = date("Y-m-d");
    $u_regdate    = $today;
    $u_gender     = $registerData->u_gender;

    class UserRegisterRequest
    {
        public $message;
        public $status;
       
    }

    $sql = "INSERT INTO `user_ecom`( `u_email`, `u_password`, `u_regdate`,`u_gender`)
            VALUES ('$u_email','$u_password','$u_regdate','$u_gender')";
    
    $obj = new UserRegisterRequest();

    if($conn->query($sql) === TRUE)
    {
        $obj->message = "User Registered successfully";
        $obj->status = "1";

    }
    else
    {
        $obj->message = "Technical error while registering  user";
        $obj->status = "-1";
    }

    echo json_encode($obj);

}

function order($data)
{
    global $conn;

    $order = json_decode($data);
    
    $p_id           = $order->p_id;
    $u_id           = $order->u_id;
    $o_date         = $order->o_date;
    $o_amount       = $order->o_amount;
    $o_ship_address = $order->o_ship_address;
    $o_zipcode      = $order->o_zipcode;
    $quantity       = $order->quantity;
    $p_name         = $order->p_name;
    $p_image         = $order->p_image; 
    
    class OrderRequest
    {
        public $message;
        public $status;
    }

    $sql = " INSERT INTO `order_ecom`(`p_id`,`u_id`, `o_date`, `o_amount`, `o_ship_address`, `o_zipcode`, `quantity`,`p_name`,`p_image`) VALUES 
    ('$p_id','$u_id','$o_date','$o_amount','$o_ship_address','$o_zipcode','$quantity','$p_name','$p_image')";
    
    $obj = new OrderRequest();

    if($conn->query($sql) === TRUE)
    {
        $obj->message = "Ordered successfully";
        $obj->status = "1";

    }
    else
    {
        $obj->message = "Technical error while Ordering";
        $obj->status = "-1";
    }

    echo json_encode($obj);
}


function payment($data)
{
    global $conn;

    $payment = json_decode($data);

    
    $pay_date        = $payment->pay_date;
    $amount          = $payment->amount;
    $o_id            = $payment->o_id;
    $payment_mode    = $payment->payment_mode;
    $full_amount     = $payment->full_amount;
    $bank_account_no = $payment->bank_account_no;
    $bank_name       = $payment->bank_name;

    class PaymentRequest
    {
        public $message;
        public $status;
    }
    $sql = " INSERT INTO `payment_ecom`( `pay_date`, `amount`, `o_id`, `payment_mode`, `full_amount`, `bank_account_no`, `bank_name`) VALUES ( ' $pay_date', '$amount', '$o_id' , '$payment_mode', '$full_amount', '$bank_account_no', '$bank_name' ) ";

    $obj = new PaymentRequest();

    if($conn->query($sql) === TRUE)
    {
        $obj->message = "Payment successfully";
        $obj->status = "1";

    }
    else
    {
        $obj->message = "Technical error ";
        $obj->status = "-1";
    }

    echo json_encode($obj);
}

function feedback($data)
{
    global $conn;

    $feedback = json_decode($data);

    
    $u_id   = $feedback->u_id;
    $f_desc = $feedback->f_desc;
    $f_date = $feedback->f_date;

    class FeedbackRequest 
    {
        public $message;
        public $status;
       
    }

    $sql = " INSERT INTO `feedback_ecom`(`u_id`, `f_desc`, `f_date`) VALUES ('$u_id','$f_desc','$f_date') ";
   
    $obj = new FeedbackRequest();

    if($conn->query($sql) === TRUE)
    {
        $obj->message = "Thank you for your feedback ";
        $obj->status = "1";

    }
    else
    {
        $obj->message = "Technical error";
        $obj->status = "-1";
    }

   echo json_encode($obj);
}

function product($data)
{
    global $conn;

    $productdata = json_decode($data);

    $s_c_id = $productdata->s_c_id;
  
    
    class ProductRequest
    {
        public $message;
        public $status;
        public $listFetched;
    }

    
    $sql = " SELECT * from product_ecom WHERE   s_c_id = '$s_c_id' ";

    $obj = new ProductRequest();

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
            while($row = $result->fetch_assoc())
            {
                $datalist[] = array(
                                        "p_id"     =>$row["p_id"],
                                        "p_name"   =>$row["p_name"],
                                        "p_code"   =>$row["p_code"],
                                        "p_status" =>$row["p_status"],
                                        "p_date"   =>$row["p_date"],
                                        "p_image"  =>$row["p_image"],
                                        "p_stock"  =>$row["p_stock"],
                                        "p_price"  =>$row["p_price"],
                                        "p_desc"   =>$row["p_desc"]
                                    );
            }     

        $obj->message="product found successfully";
        $obj->status="1";
        $obj->listFetched=$datalist;
               
    }
    else
    {
        $obj->message="product not found ";
        $obj->status="-1";
        $obj->listFetched=array();
    }

    echo json_encode($obj);

}





function productOrderDisplay($data)
{
    global $conn;

    $productdata = json_decode($data);

    $u_id = $productdata->u_id;
  
    
    class ProductRequestOrder
    {
        public $message;
        public $status;
        public $listFetched;
    }

    
    $sql = " SELECT * from order_ecom WHERE   u_id = '$u_id' ";

    $obj = new ProductRequestOrder();

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
            while($row = $result->fetch_assoc())
            {
                $datalist[] = array(
                                        "o_id"     =>$row["o_id"],
                                        "p_id"   =>$row["p_id"],
                                        "u_id"   =>$row["u_id"],
                                        "o_date" =>$row["o_date"],
                                        "o_amount"   =>$row["o_amount"],
                                        "o_ship_address"  =>$row["o_ship_address"],
                                        "o_zipcode"  =>$row["o_zipcode"],
                                        "quantity"  =>$row["quantity"],
                                        "p_name"  =>$row["p_name"],
                                        "p_image"  =>$row["p_image"]
                                        
                                    );
            }     

        $obj->message="order found successfully";
        $obj->status="1";
        $obj->listFetched=$datalist;
               
    }
    else
    {
        $obj->message="product not found ";
        $obj->status="-1";
        $obj->listFetched=array();
    }

    echo json_encode($obj);

}













function photoGallery($data)
{
    global $conn;

    $photosdata = json_decode($data);
    $p_id = $photosdata->p_id;

    class ProductPhotosRequest
    {
        public $message;
        public $status;
        public $listFetched;
    }

    $sql = " SELECT * from product_gallery WHERE p_id = '$p_id' ";

    $obj = new ProductPhotosRequest();

    $result= $conn->query($sql);

    if($result->num_rows > 0)
    {
            while($row = $result->fetch_assoc())
            {
                $datalist[] = array(
                                        "p_id" =>$row["p_id"],
                                        "p_image"=>$row["p_image"],
                                        "p_status" =>$row["p_status"],
                                        "p_date"   =>$row["p_date"]

                                    ); 
            }
            $obj->message="photos found";
            $obj->status="1";
            $obj->listFetched=$datalist;


    }
    else
    {
        $obj->message="photos not found";
        $obj->status="-1";
        $obj->listFetched=array();
    }

    echo json_encode($obj);

}

function userUpdateProfile($data)
{
    global $conn;

    $updateData = json_decode($data);

    $u_id         = $updateData->u_id;
    $u_name       = $updateData->u_name;
    $u_fname      = $updateData->u_fname;
    $u_lname      = $updateData->u_lname;
    $u_contact_no = $updateData->u_contact_no;
    $pincode      = $updateData->pincode;
    $u_address    = $updateData->u_address;
    $u_city       = $updateData->u_city;
    $u_state      = $updateData->u_state;
    $u_dob        = $updateData->u_dob;
    $u_country    = $updateData->u_country;
    $u_status     = $updateData->u_status;
    

    class UserUpdateProfileRequest
    {
        public $message;
        public $status;
       
    }

    $sql = "UPDATE `user_ecom` SET `u_name`='$u_name',`u_fname`='$u_fname',`u_lname`='$u_lname',`u_contact_no`='$u_contact_no',`pincode`='$pincode',`u_address`='$u_address',`u_city`='$u_city',`u_state`='$u_state',`u_dob`='$u_dob',`u_country`='$u_country',`u_status`='$u_status' WHERE `u_id`='$u_id'";
    
    $obj = new userUpdateProfileRequest();

    if($conn->query($sql) === TRUE)
    {
        $obj->message = "User Profile Updated successfully";
        $obj->status = "1";

    }
    else
    {
        $obj->message = "Technical Error While Updating User Profile";
        $obj->status = "-1";
    }

    echo json_encode($obj);

}


// TOKEN SELECTION PROCESS.....

if(isset($_REQUEST['gkart']) && !empty($_REQUEST['gkart']))
{
        $result = $_REQUEST['gkart'];

        switch($result)
        {
            case 'login' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    userLogin($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'category' :
                    category();
            break;

            case 'subcategory':
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    subCategory($data);  
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'register' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    userRegister($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'product' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    product($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'feedback' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    feedback($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'order' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    order($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'payment' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    payment($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'photogallery' : 
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    photoGallery($data);
                }
                else
                {
                    errorHelp();
                }
            break;

            case 'displayorder' :
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    productOrderDisplay($data);
                }
                else
                {
                    errorHelp();
                }
            break;
            

            case 'updateprofile':
                if(isset($_REQUEST['g_data']))
                {
                    $data = $_REQUEST['g_data'];
                    userUpdateProfile($data);
                }
                else
                {
                    errorHelp();
                }
            break;
            default :
            errorHelp();
        }
}
else
{
    errorHelp();
}

?>