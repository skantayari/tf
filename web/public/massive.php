<?php require_once 'config/db.php'; ?>
<?php 
    
session_start();

	include("controllers/functions.php");

	$user_data = check_login($con);

?>


<!DOCTYPE php>
<html lang="en">
<head>
    <link rel="icon" href="/img/p.png">

    <title>Generate terraform variables file </title>
    <link rel="stylesheet" href="css/default.css" id="theme-color">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
          body {font-family: Arial, Helvetica, sans-serif;}
        * {
           /* box-sizing: border-box;*/
           border-radius: 20px;
        }

    	#content {
            padding: 10px;
            background: linear-gradient(to bottom left, #3333cc 0%, #cc0099 100%);
            overflow: hidden;
        }




    	input[type=text], textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=button]{ 
            width: auto;
            float: right;
            cursor: pointer;
            padding: 7px;
        }
        #p2{
             display:inline;
        }
        .row {
            float: center;
            padding: 12px;
            display: flex;
        }

            /* Create three equal columns that sits next to each other */
        .column {
            flex: 33.33%;
            padding: 2px;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .button {
            border-radius: 20px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 28px;
            padding: 25px;
            width: 400px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -50px;
            transition: 0.2s;
        }    

        .button:hover span {
        padding-right: 50px;
        }

        .button:hover span:after {
        opacity: 1;
        right: 0;
        }

        .button:hover {background-color: #3e8e41}

        .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }

        .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        }

        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }

    </style>
</head>
<body>
<!-- <nav>
    <ul>
    </br>
      <a href="contact.html" class="button"><span> Massive creation</span></a>

    </ul>
  </nav>
<body>
    <div class="row">
        <div class="column">
          <img src="tf.png" alt="Snow" class="center" style="width:50%;height: 100%">
        </div>
        <div class="column">
          <img src="azure.png" alt="Forest" class="center" style="width:50%;height: 100%">
        </div>
    </div>  -->
<br>


<section>
   <div class="container-fluid" style="background-color: #120024">
        <nav class="navbar navbar-expand-md navbar-dark">
        <a class="navbar-brand heading-black" href="index.php">
                ADACTIM
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" >Welcome, <?php echo $user_data['username']; ?></a>
                    </li>
                </ul>    
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</section>
<br>

<section class="py-7 py-md-0 bg-hero" id="content">
    <div class="container">
        <br>
        <h1 style="color:white;text-align:center">Create a ressource groupe</h1>
        <input type="checkbox" id="myCheck" onclick="NoErg()">
        <label style="color:white;"> I want to assign my VM to an existing ressources groupe</label><br>
            <div >
                <input type="text" id="rgname" required placeholder="Enter the resource groupe name" />
            </div> <br>
            <div id="newrg" style="display:inline">
                <div >
                    <input type="text" style="display:none" id="rglocation" value="West Europe" placeholder="Enter the resource groupe location" />
                </div>
                <div  style="display:none">
                    <input type="text" id="environment" value="production" placeholder="Name your environment" />
                </div>
            </div>


        <h1 style="color:white;text-align:center">  Create virtual network</h1>
        <input type="checkbox" id="myCheck_vnet" onclick="NoEvnet()">
        <label style="color:white;"> I want to assign my VM to an existing virtual network</label><br>
        <div >
            <input type="text" id="vnetname" placeholder="name your virtual network name " />
        </div><br>
        <div id="newvnet" style="display:inline">
            <div >
                <input type="text" id="address_space" placeholder="Enter the addresse space for your network" />
            </div>
        </div>


        <h1 style="color:white;text-align:center"> Create subnet</h1>
        <input type="checkbox" id="myCheck_subnet" onclick="NoEsubnet()">
        <label style="color:white;"> I want to assign my VM to an existing subnet</label><br>
        <div >
            <input type="text" id="subnet" placeholder="name your subnet network " />
        </div><br>

        <div id="newsubnet" style="display:inline">
            <div >
                <input type="text" id="address_prefixes" placeholder="Enter the subnet address " />
            </div ><br>
        </div>


        <h1 style="color:white;text-align:center">Create public IP</h1>        
        <div >
            <input type="text" id="pubipname" placeholder="name your public IP ressource " />
        </div><br>

        
        <p style="color:white;font-size:25px;"> Allocation method</p>

                <p id="p2" style="color:aliceblue" > Dynamic </p><input type="radio" onclick="javascript:yesnoCheck();" name="check" value="Dynamic" id="dynamic"> 
                <p id="p2" style="color:aliceblue" > Static </p> <input type="radio" onclick="javascript:yesnoCheck();" name="check"  value="Static" id="static"><br>
       
            <div id="ifstatic" style="display:none"> <br>
                    <input type='text' id='prefixpub' name='prefixpub' placeholder="name your public IP ressource "><br><br>
            </div> <br>


        <h1 style="color:white;text-align: center;">Create Network Security Group and rules</h1>
        <div >
            <input type="text" id="sgname" placeholder="name your Security Groupe " />
        </div><br>

  <!--     <div >
        <select onchange="CheckOther(this);">
            <option value="Select one question....">Select one question...</option>
            <option value="On which street did you grow up?">On which street did you grow up?</option>
            <option value="What was your first phone number?">What was your first phone number?</option>
            <option value="What was the make of your first car?">what was the make of your first car?</option>
            <option value="Write your own question...">Write your own question...</option>
        </select>
        </div>
--> 
       <div  style="text-align: left;">
          <!--   <input type="button" class="button" id="bt" value="Generate Terraform file" onclick="saveFile()" />-->
            <button  id="butt"  onclick="secrule();"style="border-radius: 20px;background-color: #1ef477;width: 200px;height: 50px;"><span>Add security rule</span></button>
            <button  id="rembutt"  onclick="remrule();"style="border-radius: 20px;background-color: #1ef477;width: 200px;height: 50px;"><span>remove security rule</span></button>

          </div><br>

        <div id="rule" style="display:none;">
            <div >
                <input type="text" id="rulename" placeholder="Name your rule  " />
            </div><br>
            <div >
                <input type="text" id="priority" placeholder="add a priority >1000  " />
            </div><br>
            <div >
                <select id="direction">
                    <option selected value="">-- choose Direction --</option>
                    <option value="Inbound">Inbound</option>
                    <option value="Outbound">Outbound</option>
                </select>
            </div><br>
            <div >
                <select id="access">
                    <option selected value="">-- choose Access --</option>
                    <option value="Allow">Allow</option>
                    <option value="Deny">Deny</option>
                </select>
            </div><br>
            <div >
                <select id="protocol">
                    <option selected value="">-- Choose Protocol --</option>
                    <option value="Tcp">TCP</option>
                </select>
            </div><br>
            <div >
                <input type="text" id="source_port" placeholder="Add source port  " />
            </div><br>
            <div >
                <input type="text" id="destination_port" placeholder="Add destination port  " />
            </div><br>
            <div >
                <input type="text" id="source_address" placeholder="Add destination address  " />
            </div><br>
            <div >
                <input type="text" id="destination_address" placeholder="Add destination address  " />
            </div>   <br>       
        </div>

        <h1 style="color:white;text-align: center;">Create Network interface</h1>

        <div >
            <input type="text" id="nic" placeholder="name the network interface  " />
        </div><br>
        
        <p style="color:white;font-size:25px;"> Allocation method</p>

        <p id="p2" style="color:aliceblue" > Dynamic </p><input type="radio" onclick="javascript:pvint();" name="check2" value="Dynamic" id="dynamicpv"> 
        <p id="p2" style="color:aliceblue" > Static </p> <input type="radio" onclick="javascript:pvint();" name="check2"  value="Static" id="staticpv"><br>

    <div id="ifpv" style="display:none"> <br>
            <input type='text' id='pvadd' name='pvadd' placeholder="Add private IP address "><br><br>
    </div> <br>
      
    <h1 style="color:white;text-align: center;">Create storage account </h1>
    <div >
        <input type="text" id="storage_name" placeholder="You need just to give it a NAME and we will do the rest " />
    </div><br>

    <h1 style="color:white;text-align: center;"> Generate ssh key file </h1>

    <div >
        <input type="text" id="rsabits" placeholder=" Insert RSA bits ( Superior then 2048 recomanded) " />
    </div><br>

    <div >
        <input type="text" id="filename" placeholder=" Insert the name with .pem extention " />
    </div><br>

    <h1 style="color:white;text-align: center;"> create virtual machine </h1>

    <div >
        <input type="text" id="vmname" placeholder=" Name your virtual machine " />
    </div><br>

    <div >
        <select id="vmsize">
            <option selected value="">-- What size should it be --</option>
            <option value="Standard_B1s">Standard_B1s (1vpcu, 1GB memory)</option>
            <option value="Standard_DS1_v2">Standard_DS1_v2 (1vpcu, 3.5GB memory)</option>
            <option value="Standard_D2s_v3">Standard_D2s_v3 (2vpcu, 8GB memory)</option>
            <option value="Standard_B2s">Standard_B2s (2vpcu, 4GB memory)</option>
            <option value="Standard_D4s_v3">Standard_D4s_v3 (4vpcu, 16GB memory)</option>
            <option value="Standard_DS3_v2">Standard_DS3_v2 (4vpcu, 16GB memory)</option>
            <option value="Standard_E2s_v3">Standard_E2s_v3 (2vpcu, 16GB memory)</option>
        </select>
    </div><br>

    <div >
        <input type="text" id="diskname" placeholder=" Name your OS disk " />
    </div><br>

    <div >
        <select id="caching">
            <option selected value="">-- Select caching method --</option>
            <option value="None">None </option>
            <option value="ReadOnly">ReadOnly </option>
            <option value="ReadWrite">ReadWrite </option>
        </select>
    </div><br>

    <div >
        <select id="stacctype">
            <option selected value="">-- Select storage account type--</option>
            <option value="StandardSSD_LRS">StandardSSD_LRS </option>
            <option value="Premium_LRS">Premium_LRS </option>
            <option value="Standard_LRS">Standard_LRS </option>
        </select>
    </div><br>

    <div >
        <input type="text" id="disksize" placeholder=" Insert your disk size - GB " />
    </div><br>

    <div >
        <select id="source_image">
            <option selected value="">-- Select image--</option>
            <option value="UbuntuServer">UbuntuServer-18.04:latest</option>
        </select>
    </div><br>


    <div >
        <input type="text" id="computer_name" placeholder=" Name your computer_name " />
    </div><br>
    
    <div >
        <input type="text" id="admin_username" placeholder=" Add an admin user name  " />
    </div><br>



        <!--Add to button to save the data.-->
        <div  style="text-align:center;">
          <!-- <input type="button" class="button" id="bt" value="Generate Terraform file" onclick="saveFile()" /> -->
          <button class="btn btn-primary d-inline-flex flex-row align-items-center " id="bt" onclick="saveFile()" ><span>Generate Terraform file</span></button>
        </div><br>
        
    </div>
    </div>
        
</section>

<script>  


  /*  function CheckOther(selectBox){

        if (selectBox.options[selectBox.selectedIndex].value == "Write your own question...")
        {
            document.getElementById("TextBox1").style.display = "inline";
        }
        else
        {
            document.getElementById("TextBox1").style.display = "none";
            document.getElementById("TextBox1").value = "";
        }
    }*/

       function yesnoCheck() {
        if (document.getElementById('static').checked) {
            document.getElementById('ifstatic').style.display = 'inline';
        }
        else document.getElementById('ifstatic').style.display = 'none';
        }

        function NoErg(){
            var checkBox = document.getElementById("myCheck");
            var text2 = document.getElementById("newrg");

            if (checkBox.checked == true){
                text2.style.display = "none";

            } else {
                text2.style.display = "inline";
            }
        }

        function NoEvnet(){
            var checkBox = document.getElementById("myCheck_vnet");
            var text2 = document.getElementById("newvnet");

            if (checkBox.checked == true){
                text2.style.display = "none";

            } else {
                text2.style.display = "inline";
            }
        }

        function NoEsubnet(){
            var checkBox = document.getElementById("myCheck_subnet");
            var text2 = document.getElementById("newsubnet");

            if (checkBox.checked == true){
                text2.style.display = "none";

            } else {
                text2.style.display = "inline";
            }
        }
        

        var count = 0;
        function secrule() {
            count++;
            if (count > 0 ) {
                document.getElementById('rule').style.display = 'inline';
                document.getElementById('butt').onclick = function(){
                    document.getElementById('rule').style.display = 'inline';
                    count ++
                };  

            }         
        }

        function remrule(){
            count --
            document.getElementById('rule').style.display = 'none';
        }

        function pvint() {
        if (document.getElementById('staticpv').checked) {
            document.getElementById('ifpv').style.display = 'inline';
        }
        else document.getElementById('ifpv').style.display = 'none';
        }


    let saveFile = () => {
    	
        // Get the data from each element on the form.
    	const rgname = document.getElementById('rgname');
        const rglocation = document.getElementById('rglocation');
        const environment = document.getElementById('environment');
        const vnetname = document.getElementById('vnetname');
        const address_space = document.getElementById('address_space');
        const subnet = document.getElementById('subnet');
        const address_prefixes = document.getElementById('address_prefixes');
        const pubipname = document.getElementById('pubipname');
        const sgname = document.getElementById('sgname');


        var allocation_method;
        var prefixpub;
        if (document.getElementById('dynamic').checked) {
            allocation_method = document.getElementById('dynamic').value;
        }
        else {
            allocation_method = document.getElementById('static').value;            
            prefixpub = ' public_ip_prefix_id = "' + document.getElementById('prefixpub').value +'"';
        }    
        function gkk(prefixpub) {
                if (document.getElementById('static').checked) {
                      return  prefixpub
                }
                else return ""
            }
        
        var arule = ' security_rule {\r   name= "' +
        document.getElementById('rulename').value +'" \r' + 
        '   priority = "' + document.getElementById('priority').value +'" \r' + 
        '   direction = "' + document.getElementById('direction').value +'"\r' + 
        '   access = "' + document.getElementById('access').value +'"\r' + 
        '   protocol = "' + document.getElementById('protocol').value +'"\r' +
        '   source_port_range = "' + document.getElementById('source_port').value +'"\r' +
        '   destination_port_range = "' + document.getElementById('destination_port').value +'"\r' +
        '   source_address_prefix = "' + document.getElementById('source_address').value +'"\r' +
        '   destination_address_prefix = "' + document.getElementById('destination_address').value +'"\r }\r'
        
    
        
        function skk() {  
           if ( count == 1) {  
                    return arule
            } else return ""
            
        }

        const nicnamme = document.getElementById('nic');

        var allocation_method_pv;
        var prefixpv;
        if (document.getElementById('dynamicpv').checked) {
            allocation_method_pv = document.getElementById('dynamicpv').value;
        }
        else {
            allocation_method_pv = document.getElementById('staticpv').value;            
            prefixpv = '  private_ip_address = "' + document.getElementById('pvadd').value +'"';
        }    
        function pkk(prefixpv) {
                if (document.getElementById('staticpv').checked) {
                      return  prefixpv
                }
                else return ""
            }

        const stname = document.getElementById('storage_name');
        const rsabits = document.getElementById('rsabits');
        const filename = document.getElementById('filename');
        const vmname = document.getElementById('vmname');
        const vmsize = document.getElementById('vmsize');
        const diskname = document.getElementById('diskname');
        const caching = document.getElementById('caching');
        const stacctype = document.getElementById('stacctype');
        const disksize = document.getElementById('disksize');
        const source_image = document.getElementById('source_image');
        const computer_name = document.getElementById('computer_name');
        const admin_username = document.getElementById('admin_username');

        var newrgp = '\rresource "azurerm_resource_group" "rg" {' + ' \r\n '  +' name ="' + rgname.value +'"' + ' \r\n '  + 
        ' location ="' + rglocation.value +'"' + ' \r\n '  + 
        '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n ' 

        function NoE_rg(newrgp) {
                var checkBox = document.getElementById("myCheck");
                if (checkBox.checked == true ) {
                      return  ""
                }
                else return newrgp
        }

        var newvnetp = '\rresource "azurerm_virtual_network" "vnet" {'+'\n'+'  name = "' + vnetname.value +'"' + ' \r\n '  + 
        ' address_space = ["' + address_space.value +'"]' + ' \r\n ' +
        ' location ="' + rglocation.value +'"' + ' \r\n '  + 
        ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
        '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n '  

        function NoE_vnet(newvnetp) {
                var checkBox = document.getElementById("myCheck_vnet");
                if (checkBox.checked == true ) {
                      return  ""
                }
                else return newvnetp
        }

        var newsubnetp1 = '\rresource "azurerm_subnet" "subnet" {'+'\n '+' name ="' + subnet.value +'"' + ' \r\n '  + 
        ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
        ' virtual_network_name = "' + vnetname.value+'"'+ ' \r\n '  + 
        ' address_prefixes = ["' + address_prefixes.value +'"]' + '\r\n' +'}' + ' \r\n '  

        var newsubnetp2 = '\rdata "azurerm_subnet" "subnet1" {'+'\n '+' name ="' + subnet.value +'"' + ' \r\n '  + 
        ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
        ' virtual_network_name = "' + vnetname.value+'"'+ '\r\n'  +'}' + ' \r\n '

        function NoE_subnet(newsubnetp2,newsubnetp1) {
                var checkBox = document.getElementById("myCheck_subnet");
                if (checkBox.checked == true ) {
                    return  newsubnetp2
                }
            else return newsubnetp1
        } 
        
        var subid1 = 'subnet_id = azurerm_subnet.subnet.id'
        var subid2 = 'subnet_id = data.azurerm_subnet.subnet1.id'

        function NoE_subnetid(subid1,subid2) {
                var checkBox = document.getElementById("myCheck_subnet");
                if (checkBox.checked == true ) {
                    return  subid2
                }
            else return subid2
        }




        
        // This variable stores all the data.
        let data = 
            'provider "azurerm"{'+ ' \r\n '  + 'version = "=2.37.0" ' + ' \r\n '  + 'features {}' + '\r}' + ' \r\n '  + 

            NoE_rg(newrgp) + NoE_vnet(newvnetp) + NoE_subnet(newsubnetp2,newsubnetp1) + 



            '\rresource "azurerm_public_ip" "public_ip" {' + ' \r\n '  +' name ="' + pubipname.value +'"' + ' \r\n ' +
            ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
            ' location ="' + rglocation.value +'"' + ' \r\n '  + 
            ' allocation_method = "' + allocation_method +'"' + ' \r\n ' + gkk(prefixpub) +
            '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n '  + 


            '\rresource "azurerm_network_security_group" "nsg" {' + ' \r\n '  +' name ="' + sgname.value +'"' + ' \r\n ' +     
            ' location ="' + rglocation.value +'"' + ' \r\n '  + 
            ' resource_group_name = "' + sgname.value +'"' + ' \r\n '  + skk() +
            '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n '  + 

            '\rresource "azurerm_network_interface" "nic" {' + ' \r\n '  +' name ="' + nicnamme.value +'"' + ' \r\n ' + 
            ' location ="' + rglocation.value +'"' + ' \r\n '  + 
            ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
            '\r ip_configuration { \r   name= "nicConfiguration" \r   '+ NoE_subnetid(subid1,subid2) + ' \r\n '+
            '  private_ip_address_allocation = "' + allocation_method_pv +'"' + ' \r\n ' + pkk(prefixpv) +
            '  public_ip_address_id = azurerm_public_ip.public_ip.id' + ' \r\n ' +' }' +
            '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n '  + 

            ' \rresource "azurerm_network_interface_security_group_association" "association" {' + ' \r\n ' +
            ' network_interface_id      = azurerm_network_interface.nic.id' + ' \r\n ' +
            ' network_security_group_id = azurerm_network_security_group.nsg.id' + '\r\n' + '}'+ ' \r\n ' +

            ' \rresource "azurerm_storage_account" "storage" {' + ' \r\n ' +' name ="' + stname.value +'"' + ' \r\n ' +
            ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
            ' location ="' + rglocation.value +'"' + ' \r\n '  + 
            ' account_tier = "Standard"' + ' \r\n '  +
            ' account_replication_type = "LRS"'+ ' \r\n '  +
            '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n '  + 

            ' \rresource "tls_private_key" "example_ssh" { \n  algorithm = "RSA"' + ' \r\n ' +
            ' rsa_bits  = ' + rsabits.value + '\r\n'  +'}' + ' \r\n '+
            ' \rresource "local_file" "cloud_pem" {'+ ' \r\n ' +' filename ="' + filename.value +'"' + ' \r\n ' +
            ' content = tls_private_key.example_ssh.private_key_pem ' + '\r\n'  +'}' + ' \r\n ' +

            ' \rresource "azurerm_linux_virtual_machine" "linuxvm" {' + ' \n ' +' name ="' + vmname.value +'"' + ' \r\n ' +
            ' location ="' + rglocation.value +'"' + ' \r\n '  + 
            ' resource_group_name = "' + rgname.value +'"' + ' \r\n ' +
            ' network_interface_ids = [azurerm_network_interface.nic.id] ' + ' \r\n ' +
            ' size = "' + vmsize.value + '"' + ' \r\n ' +

            ' \r os_disk { ' + ' \r\n ' +'   name ="' + diskname.value +'"' + ' \r\n ' +
            '   caching = "' + caching.value + '"' + ' \r\n ' +
            '   storage_account_type = "' + stacctype.value + '"' + ' \r\n ' + ' }' + ' \r\n ' +

            ' \r source_image_reference { ' + ' \r\n ' +'  publisher = "Canonical"' + '\r\n' +
            '   offer ="' + source_image.value + '"' + '\r\n ' + '  sku = "18.04-LTS" ' + ' \r\n ' + 
            '  version = "latest" '+  '\r\n ' + ' }' +  '\r\n ' +

            ' \r  computer_name = "' + computer_name.value + '"' + ' \r\n ' +
            ' admin_username = "' + admin_username.value + '"' + ' \r\n ' +
            ' disable_password_authentication = true '  + ' \r\n ' +

            '\r  admin_ssh_key { '  + ' \r\n ' +
            '   username = "' + admin_username.value + '"' + ' \r\n ' +
            '   public_key = tls_private_key.example_ssh.public_key_openssh  '  + ' \r\n ' + ' }' +'\r\n' +

            '\r boot_diagnostics { '  + ' \r\n ' +
            '   storage_account_uri = azurerm_storage_account.storage.primary_blob_endpoint '  + ' \r\n ' + ' }' +'\r\n' +
            '\r tags = { ' + ' \r\n '  +'   environment = "' + environment.value +'" \r  }' + '\r\n'  +'}' + ' \r\n '  
        
        // Convert the text to BLOB.
        function validateForm() {
            var a = admin_username.value;
            var b = rgname.value;
            var c = rglocation.value;
            var d = environment.value;
            var e = vnetname.value;
            var f = address_space.value;
            var g = subnet.value;
            var h = address_prefixes.value;
            var i = pubipname.value;
            var j = sgname.value;
            var k = nicnamme.value;
            var l = stname.value;
            var m = rsabits.value;
            var n = filename.value;
            var o = vmname.value;
            var p = vmsize.value;
            var q = diskname.value;
            var aa = caching.value;
            var bb = stacctype.value;
            var cc = disksize.value;
            var dd = source_image.value;
            var ee = computer_name.value;

       
            if (a == "" || b == "" || c == "" || d == "" || e == "" || g == "" || i == "" || g == "" || k == "" || l == "" || m == "" || n == "" || o == "" || p == "" || q == "" || aa == "" || bb == "" || cc == "" || dd == "" || ee == "" || j == "") {
                alert(" You must be missing some fields !! ");
                return false;
            }
            else return true;
        }

        function validateForm_check() {
            var f = address_space.value;
            var h = address_prefixes.value;

            var checkBox1 = document.getElementById("myCheck_vnet");
            var checkBox2 = document.getElementById("myCheck_subnet");

            if ((validateForm() == true)&& (checkBox1.checked == false) && (f == "")) {
                alert(" You must be missing some fields !!");
                return false;
            } else if ((validateForm() == true)&& (checkBox2.checked == false) && (h == "")) {
                alert(" You must be missing some fields !!");
                return false;
            } else if ((validateForm() == true)&& (checkBox1.checked == false) && (checkBox1.checked == false) && (f == "") && (h == ""))  {
                alert(" You must be missing some fields !!");
                
                return false;
            }else  if ((validateForm() == true)&& (checkBox1.checked == true) && (f == "")) {
                return true;
            } else if ((validateForm() == true)&& (checkBox2.checked == true) && (h == "")) {
                return true;
            } else if ((validateForm() == true)&& (checkBox1.checked == true) && (checkBox1.checked == true) && (f == "") && (h == ""))  {
                return true;
            } else return true;
        }



        
        const textToBLOB = new Blob([data], { type: 'text/plain' });
        const sFileName = 'main.tf';	   // The file to save the data.

        let newLink = document.createElement("a");
        newLink.download = sFileName;

        if (window.webkitURL != null) {
            newLink.href = window.webkitURL.createObjectURL(textToBLOB);
        }
        else {
            newLink.href = window.URL.createObjectURL(textToBLOB);
            newLink.style.display = "none";
            document.body.appendChild(newLink);
        }

        if ((validateForm() == true)&& (validateForm_check() == true)){
            newLink.click(); 
        }
    }

</script>
</body>

</html>