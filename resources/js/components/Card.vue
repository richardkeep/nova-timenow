<template>
    <Card class="relative px-6 py-4">
        <div class="flex mb-4">
            <h3 class="flex items-center text-base text-80 font-bold">
               <HeroiconsSolidClock />
                <span class="ml-1">
                    Time Now
                </span>
            </h3>
            <select v-model="currentTimezone" class="select-box-sm ml-auto min-w-24 h-6 text-xs appearance-none bg-gray-200 px-4 active:outline-none active:shadow-outline focus:outline-none focus:shadow-outline">
                <option v-for="timezone in card.timezones" :value="timezone" :key="timezone">{{ timezone }}</option>
            </select>
        </div>

        <p class="flex items-center text-4xl mb-4">{{ time }}</p>

        <div class="flex items-center">
            <p class="text-80 font-bold">{{ date }}</p>
        </div>
    </Card>
</template>

<script>
import moment from 'moment-timezone';
import HeroiconsSolidClock from '../../../../../vendor/laravel/nova/resources/js/components/Heroicons/solid/HeroiconsSolidClock.vue';
export default {
    props: ["card"],
    data() {
        return {
            currentTimezone: this.card.defaultTimezone,
            date: "",
            time: ""
        };
    },
    mounted() {
        this.startInterval();
        this.updateCurrentTime();
    },
    methods: {
        updateCurrentTime() {
            let { locale, timeFormat, dateFormat } = this.card;
            let datetime = moment().locale(locale).tz(this.currentTimezone);
            this.time = datetime.format(timeFormat);
            this.date = datetime.format(dateFormat);
        },
        startInterval() {
            setInterval(() => {
                return this.updateCurrentTime();
            }, 1000);
        }
    },
    components: { HeroiconsSolidClock }
}
</script>
