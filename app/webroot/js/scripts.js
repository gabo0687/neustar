$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
    //Function adding Countries	
    var frm = $('#add_form');
    frm.submit(function (e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: frm.attr('action'),
            data: frm.serialize(), // serializes the form's elements.
            success: function (data)
            {   
               $('.close').click();
               location.reload(); 
            }
        });

    });
    
    //Function deleting a country
      var frm_delete = $('#delete_form');
    frm_delete.submit(function (e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: frm_delete.attr('action'),
            data: frm_delete.serialize(), // serializes the form's elements.
            success: function (data_delete)
            {   
               $('.close_delete').click();
               location.reload(); 
            }
        });

    });
    
    
    //Function editing a country
    var frm_edit = $('#edit_form');
    frm_edit.submit(function (e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: frm_edit.attr('action'),
            data: frm_edit.serialize(), // serializes the form's elements.
            success: function (data_edit)
            {   
               $('.close_edit').click();
               location.reload(); 
            }
        });

    });
    
    
    //Add value to input hidden countryId in modal
    $( ".code-delete" ).click(function(){
     $("#countryId").val($(this).data('id'));
    });
    
    //Load edit info in modal
    $( ".code-edit" ).click(function(){
     var countryId = $(this).data('id');
     $.ajax({
            type: "POST",
            url: 'Pages/countryeditview',
            data: 'countryId='+countryId,// serializes the form's elements.
            success: function (data)
            {   
              $('#view_response').html(data);  
              $('#editCountryModal').modal('show');
            }
        });
    });
        
});

//Open Country info from https://restcountries.eu
function openView(modal,CountryCode){
     $.ajax({
            type: "POST",
            url: 'Pages/countrydetail',
            data: 'CountryCode='+CountryCode,// serializes the form's elements.
            success: function (data)
            {   
              $('#viewCountry').html(data);  
              $('#'+modal).modal('show');
            }
        });
    
}