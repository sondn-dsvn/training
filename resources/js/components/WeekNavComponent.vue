<template>
	<div class="columns">
		<div class="column is-three-quarters">
			<div class="ts-header">
				<div class="ts-nav">
					<span class="icon has-text-info">
					  <i class="fa fa-chevron-left fa-lg"></i>
					</span>
					<span>May 2, 2018</span>
					<span class="icon has-text-success">
						<i class="fa fa-calendar fa-lg"></i>
					</span>
					<span>May 8, 2018</span>
					<span class="icon has-text-info">
					  <i class="fa fa-chevron-right fa-lg"></i>
					</span>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="columns ts-action">
				<div class="column is-three-fifths">
					<div class="field is-grouped">
						<div class="buttons has-addons is-centered">
					  	<span class="button is-primary">Task import</span>
					  	<span class="button is-primary">
								<i class="fa fa-angle-down fa-lg"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="column">
					<div>
						<a class="button is-warning">clear</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

export default {
	props: ["row", "vatCodes"],
	data: function() {
		return {
			selected: false
		}
	},
	watch: {
		selected: function(vat) {
			this.vatCode = vat;
		}
	},
	methods: {},
	created: function() {

	}
}
</script>
