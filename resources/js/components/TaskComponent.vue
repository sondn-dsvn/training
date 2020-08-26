<template>
		<div class="columns">
				<div class="column">
					<div class="control">
							<div class="select">
								<select>
									<option v-for="group in groups" :value="group.id">
										 {{ group.value }}
									</option>
								</select>
							</div>
						</div>
				</div>
				<div class="column">
					<div class="control">
							<div class="select">
									<select>
											<option>Select dropdown</option>
											<option>With options</option>
									</select>
							</div>
						</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
							<div class="control mon">
								<input class="input" type="text" placeholder="0.0">
							</div>
				</div>
				<div class="column">
						0.0
				</div>
				<div class="column">
					<span class="icon has-text-info">
					  <i class="fa fa-checkbox fa-lg"></i>
					</span>
				</div>
		</div>
</template>

<script>

export default {
	props:[],
	data: function() {
		return {
			groups: [
				{id:5, value: "Development"},
				{id:6, value: "Migration"}
			]
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
