<template>
    <card class="relative px-6 py-4">
        <div class="flex mb-4">
            <h3 class="mr-3 text-base text-80 font-bold">Time Now</h3>
            <select v-model="currentTimezone" class="select-box-sm ml-auto min-w-24 h-6 text-xs appearance-none bg-40 pl-2 pr-6 active:outline-none active:shadow-outline focus:outline-none focus:shadow-outline">
                <option v-for="timezone in card.timezones" :value="timezone" :key="timezone">{{ timezone }}</option>
            </select>
        </div>

        <p class="flex items-center text-4xl mb-4">{{ time }}</p>

        <div class="flex items-center">
            <p class="text-80 font-bold">{{ date }}</p>
        </div>
    </card>
</template>

<script>
import moment from 'moment-timezone';
export default {
    props: ['card'],

    data() {
        return {
            currentTimezone: this.card.defaultTimezone,
            date: '',
            time: ''
        }
    },
    mounted() {
       this.startInterval();
       this.updateCurrentTime();
   },
   methods: {
       updateCurrentTime() {
           let { locale, timeFormat, dateFormat } = this.card

           let datetime = moment().locale(locale).tz(this.currentTimezone)
           this.time = datetime.format(timeFormat);
           this.date = datetime.format(dateFormat);
       },
       startInterval() {
           setInterval(() => {
               return this.updateCurrentTime();
           }, 1000);
       }
   }
}
</script>
