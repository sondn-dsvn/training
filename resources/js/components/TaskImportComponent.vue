<template>
	<div class="columns">
		<div class="container">
			<br/>
			<div class="field">
				<label class="label">Username</label>
				<div class="control has-icons-left has-icons-right">
					<input class="input is-success" type="text" placeholder="Text input" value="bulma">
					<span class="icon is-small is-left">
      					<i class="fas fa-user"></i>
    				</span>
					<span class="icon is-small is-right">
      					<i class="fas fa-check"></i>
    				</span>
  				</div>
 				<p class="help is-success">This username is available</p>
			</div>
			<v-select v-model="selected" :options="['foo','bar']"></v-select>
			<div class="field">
  				<label class="label">Subject</label>
  				<div class="control">
    				<div class="select">
      					<select>
        					<option>Select dropdown</option>
        					<option>With options</option>
      					</select>
    				</div>
  				</div>
			</div>
		</div>
	</div>
</template>

<script>

import VueSelect from 'vue-select'

export default {
	props: ["row", "vatCodes"],
	components: {
		'v-select': VueSelect
	},
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
