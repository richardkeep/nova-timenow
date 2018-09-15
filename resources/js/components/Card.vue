<template>
    <card class="flex flex-col items-center justify-center">



                <div class="flex mb-4">
                    <h3 class="mr-3 text-base text-80 font-bold">Time</h3>

                    <select v-model="timezone" class="ml-auto min-w-24 h-6 text-xs no-appearance bg-40">
                        <option v-for="t in timezones" :value="t">{{ t }}</option>
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
            timezones: [
                "America/Los_Angeles",
                "Africa/Nairobi"
            ],
            timezone:  "Africa/Nairobi",
            date: '',
            time: ''
        }
    },
    mounted() {
        setInterval(function() {
            let date = moment().tz(this.timezone)
            this.time = date.format("h:mm:ss a");
            this.date = date.format("ddd, Do MMM YYYY");

        }.bind(this), 1000)
    },
}
</script>
