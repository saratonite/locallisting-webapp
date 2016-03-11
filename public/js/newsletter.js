"use strict";
(function(window,$){


	var newsletterapp = (function(){

		var app = function(){

			this.el  = $("#newsletterapp");

			this.email = null;

			this.baseUrl = null;



		}

		app.prototype = {

			init:function(options){

				this.baseUrl = options.baseUrl || '';


				this.el = $("#newsletterapp");

				this.emailEl = this.el.find("[type=email]");


				// onsubmit Event
				var self = this;
				this.el.on('submit',function(e){

					self.email = self.emailEl.val().trim().toLowerCase();

					if(self.validate()){



						self.submit();

					}
					else{
						self.emailEl.focus();
						alert("Invalid email address");
					}

					

					e.preventDefault();

				});

			},
			validate:function(){

				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    			return re.test(this.email);



			},
			submit:function(){

				var self= this;

				var email = this.email;

				this.emailEl.attr('disabled',true);

				$.ajaxSetup({
        			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    			});

				$.ajax({
					url:self.baseUrl+'/subscribe',
					data:{"email":email},
					method:"POST",
					dataType:'json',
					success:function(response){

						alert(response.message);

						self.resetApp();
						$(document).scrollTop(10);
						self.emailEl.attr('disabled',false);


					},
					error:function(xhr){
					
						if(xhr.status == 422){

							alert(xhr.responseJSON.message);

							return false;

						}

						alert('Network error!!');
				self.emailEl.attr('disabled',false);


					}
				})

			},
			resetApp:function(){
				this.emailEl.val('');
			}
		}


		return app;
	})();

	window.newsletter = newsletterapp ;

})(window,jQuery);


$(function(){

	var nsl = new newsletter();
	nsl.init({'baseUrl':GLOBAL_BASE_URL});

});


//# sourceMappingURL=newsletter.js.map
