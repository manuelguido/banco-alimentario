<template>
	<div class="container-fluid w-100 my-4">
		<div class="row">
			<div class="col-12 text-center">
				<ul class="progressBar">
					<li class="step" v-for="step in steps" :key=step.id v-on:click="stepper(step.id)" v-bind:class="{active: step.isActive}">
						<div class="number"><i class="icon fa-lg" :class=step.icon></i></div>
						<h1 class="h6 w300 mt-2">{{step.title}}</h1>
					</li>
				</ul>
			</div>

			<div class="col-12 py-5 step-form" v-show="steps[0].show">
				<div class="form-group">
					<form-label title="Nombre de la empresa" req></form-label>
					<input id="company_name" name="company_name" type="text" class="form-control" placeholder="Enterprise SRL" autofocus required>
				</div>
				<next-button></next-button>
			</div>

			<div class="col-12 py-5 step-form" v-show="steps[1].show">
				<div class="form-group col-12 col-xl-6">
					<form-label title="Dos" req></form-label>
					<input id="company_name" name="company_name" type="text" class="form-control" placeholder="Enterprise SRL" autofocus required>
				</div>
				<next-button title="siguiente"></next-button>
			</div>

			<div class="col-12 py-5 step-form" v-show="steps[2].show">
				<div class="form-group col-12 col-xl-6">
					<form-label title="Tres" req></form-label>
					<input id="company_name" name="company_name" type="text" class="form-control" placeholder="Enterprise SRL" autofocus required>
				</div>
				<next-button title="siguiente"></next-button>
			</div>

			<div class="col-12 py-5 step-form" v-show="steps[3].show">
				<div class="form-group col-12 col-xl-6">
					<form-label title="Cuatro" req></form-label>
					<input id="company_name" name="company_name" type="text" class="form-control" placeholder="Enterprise SRL" autofocus required>
				</div>
				<next-button title="siguiente"></next-button>
			</div>

		</div>
	  </div>
</template>

<script>
export default {
    data() {
      	return {
			currentStep: 1,
        	steps: [
          		{ 
					id: "1",
					icon: "fas fa-landmark",
					title: "Información de Donante",
					isActive: true,
					show: false,
				},
          		{
					id: "2",
					icon: "fas fa-map-marker-alt",
					title: "Sucursal / es",
					isActive: false,
					show: false,
				},
          		{
					id: "3",
					icon: "fas fa-user",
					title: "Persona responsable",
					isActive: false,
					show: false,
				},
          		{
					id: "4",
					icon: "fas fa-unlock-alt",
					title: "Contraseña",
					isActive: false,
					show: false,
				}
			],
      	}
	},
	methods: {
		backStep: function (current) {

		},
		nextStep: function (current) {
			
		},
		setStep: function (id) {
			this.steps.forEach(element => {
				element.show = false;
			});
			this.steps[id].show = true;
		},
	},
	created() {
		this.setStep(1);
	}
}
</script>

<style>
.step {
	display: inline-block;
	margin: 0 auto;
	width: 25%;
	vertical-align: top;
	padding: 0 !important;
}
.number {
	border-radius: 150px;
	width: 50px;
	height: 50px;
	padding: 2px;
	background: var(--white-c);
	color: #fff;
	margin: 0 auto;
}
.step.active .number, .step.done .number {
	background: var(--seed-primary) !important;
}
.icon {
	margin-top: 11px;
}
</style>