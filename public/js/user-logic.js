$( document ).ready( function() 
{
	const USER_TYPE = $("select[name='user_type']");

	if( USER_TYPE.is(':checked') ){
		let target = USER_TYPE.data('target');
		$(`${target}`).show();
	}

	$('#id_user_type').change(function(){
		let userType = $(this).val();
		let selectedUser = '';
		switch(userType){
			case 'staff':
				selectedUser = 'physician';
				break;
			case 'patient':
				selectedUser = 'client';
				break;
			case 'sub_admin':
				selectedUser = 'staff01';
				break;
		}

		$.each($('#user_preference').find(":selected"), function(index, element){
			$(element).removeAttr('selected');
		});
		
		$(`#user_preference option[value='${selectedUser}']`).attr('selected', true);
	});

});
