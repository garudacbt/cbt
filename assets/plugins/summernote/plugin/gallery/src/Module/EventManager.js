export default class EventManager {
    constructor() {
        // events store
        this.events_queue = {};
    }

    // Register an event
    on(event_name, closure) {
        if (! Array.isArray(this.events_queue[event_name]) ) {
            this.events_queue[event_name] = [];
        }

        this.events_queue[event_name].push(closure);

        return this;
    }

    // Fire an event
    trigger(event_name, params) {
        var events = this.events_queue[event_name] || [];

        for (var i = 0; i < events.length; i++) {
            events[i].apply(this, params);
        }

        return this;
    }

    clearAll() {
        this.events_queue = {};

        return this;
    }
}