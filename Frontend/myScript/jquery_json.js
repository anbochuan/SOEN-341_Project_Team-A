$(document).ready(function(){

  load_json_data('productCategory', 0);// call the function below

  function load_json_data(id, parent_id)
  {
    var html_code = ''; //store dynamic html code based on the select option  
    $.getJSON('productCategory.json', function(data){ // fetch data from the jason file and all have been storeed in function(data)

      html_code += '<option value="">Please choose one '+id+'</option>'; // dynamically change based on the parameter id variable
      $.each(data, function(key, value){ // fetch data array one by one
        if(id == 'productCategory')// for productCategory1
        {
          if(value.parent_id == '0') // make sure it belongs to the productCategory1
          {
            html_code += '<option value="'+value.id+'">'+value.name+'</option>'; // append html_code
          }
        }
        else // for productCategory2 and productCategory3
        {
          if(value.parent_id == parent_id) // check the json file's value's parent_id equals to the function parameter parent_id 
          {    
            html_code += '<option value="'+value.id+'">'+value.name+'</option>';
          }
        }
      });
      $('#'+id).html(html_code); // store the html_code data into select box
    });

  }

  $(document).on('change', '#productCategory', function(){ // when you select the Sub-category, this code will execute
    var productCategory_id = $(this).val();
    if(productCategory_id != '')
    {
     load_json_data('productCategory2', productCategory_id); // fill the subCategory based on the selection of productCategory1
    }
    else // will empty both select box
    {
     $('#productCategory2').html('<option value="">Select productCategory2</option>');
     $('#productCategory3').html('<option value="">Select productCategory3</option>');
    }
  });
  $(document).on('change', '#productCategory2', function(){ // when you select the Sub-sub category, this code will execute
    var productCategory2_id = $(this).val();
    if(productCategory2_id != '')
    {
     load_json_data('productCategory3', productCategory2_id); // fill the Sub-sub Category based on the selection of productCategory2
    }
    else
    {
     $('#productCategory3').html('<option value="">Select productCategory3</option>');// will empty the select box
    }
  });
});