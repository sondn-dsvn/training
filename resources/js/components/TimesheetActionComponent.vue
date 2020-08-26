<template>
	<div class="columns">
		<div class="column is-four-fifths">
      <div>
        <a class="button is-primary">Save</a>
      </div>
    </div>
		<div class="column">
				<span class="button is-success">Submit for Approval</span>
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
