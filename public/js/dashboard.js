(function(window,$){
	console.log('Confirm box');

	var Confirmbox = (function(){

		var cb = function(){		
			this.record = null;
			this.submit_url = null;
			this.modal =null;

			this.bindEl = null;
			this.action = null;
			this.recordId = null;
			this.method = null;
		};

		cb.prototype.create = function(options){

			this.modal = options.modal || ".modal";
			this.bindEl = $(options.el);
			this.action =  $(this.bindEl).data('action') || "default";
			this.recordId =  $(this.bindEl).data('record-id') || options.recordId || null;

			this.submit_url = options.action_url+"/"+this.recordId || '/'+this.recordId;
			var self = this;

			$(this.bindEl).on('click',function(){
				self.action =  $(this).data('action') || "default";
				self.fillModalForm(this);
				self.showModal();

			});
		};

		cb.prototype.fillModalForm = function(element){
			var form = $(this.modal).find('form');

			var idFeild = form.find('[name=id]');
			var actionFeild = form.find('[name=action]');

			console.log(idFeild);

			form.attr('action',this.submit_url);
			var methodOption = form.find('[name=_method]');
			idFeild.val(this.recordId);
			if(actionFeild.length){
				actionFeild.val(this.action);
			}

		};

		cb.prototype.showModal = function(){
			$(this.modal).modal('show');
		};

		return cb;
	})();

	window.Confirmbox = Confirmbox;

})(window,jQuery);

//# sourceMappingURL=dashboard.js.map
