<template>
		<div class="container">
			<p class="title is-1">Timesheet Appp</p>
			<p class="subtitle is-3">Comperhensive Timesheet application</p>
			<div class="notification is-success">
			  <button class="delete"></button>
			  Primar lorem ipsum. <strong>Pellentesque risus mi</strong>, tempus quis elit
			</div>
			<WeekNavComponent></WeekNavComponent>
			<TaskComponent></TaskComponent>
			<hr/>
			<TaskComponent></TaskComponent>
			<hr/>
			<TaskComponent></TaskComponent>
			<TaskHourComponent></TaskHourComponent>

			<TimesheetActionComponent></TimesheetActionComponent>
		</div>
</template>

<script>

import VueSelect from 'vue-select'
import TaskComponent from './TaskComponent.vue'
import WeekNavComponent from './WeekNavComponent.vue'
import TimesheetActionComponent from './TimesheetActionComponent.vue'

export default {
	props: ["row", "vatCodes"],
	components: {
		'v-select': VueSelect,
		'TaskComponent': TaskComponent,
		'WeekNavComponent': WeekNavComponent,
		'TimesheetActionComponent': TimesheetActionComponent
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
