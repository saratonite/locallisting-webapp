(function(window,$){

	var Confirmbox = (function(){

		var cb = function(){		
			this.record = null;
			this.submit_url = null;
			this.modal =null;

			this.bindEl = null;
			this.action = null;
			this.recordId = null;
			this.method = null;

			this.url = false;
		};

		cb.prototype.create = function(options){

			this.options = options;

			this.modal = options.modal || ".modal";
			this.bindEl = $(options.el);
			this.action =  $(this.bindEl).data('action') || "default";
			this.recordId =  $(this.bindEl).data('record-id') || options.recordId || null;

			this.submit_url = options.action_url+"/"+this.recordId || '/'+this.recordId;
			var self = this;

			$(this.bindEl).on('click',function(){
				self.action =  $(this).data('action') || "default";
				self.recordId =  $(this).data('record-id') || self.options.recordId || null;
				self.submit_url = self.options.action_url+"/"+self.recordId || '/'+self.recordId;
				self.fillModalForm(this);
				self.showModal();

			});
		};

		cb.prototype.fillModalForm = function(element){
			var form = $(this.modal).find('form');

			var idFeild = form.find('[name=id]');
			var actionFeild = form.find('[name=action]');

			
			if(!this.url){
				form.attr('action',this.submit_url);
			}
			else{
				form.attr('action',this.url);
			}
			var methodOption = form.find('[name=_method]');
			idFeild.val(this.recordId);
			if(actionFeild.length){
				actionFeild.val(this.action);
			}

		};

		cb.prototype.setActionUrl = function(url){

			this.url = url;

		}

		cb.prototype.showModal = function(){
			$(this.modal).modal('show');
		};

		return cb;
	})();

	window.Confirmbox = Confirmbox;

})(window,jQuery);