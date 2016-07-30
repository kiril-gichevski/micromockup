var MICROMOCKUP = MICROMOCKUP || {};
(function () {
    MICROMOCKUP.Log = (function () {
        var instance = null;

        var injection = function () {
            return {};
        };

        var initInstance = function () {
            /* private */
            var me = {
                config: {
                    log: 'log me'
                }
                ,init: function () {
                    console.log(me.config.log)
                }
            };
            /* public */
            var baseObj = {};

            /* attach public functions to singleton */
            $.each(injection.call(me, me), function (idx, prop) {
                baseObj[idx] = prop;
            });

            /* execute init method */
            me.init();

            return baseObj;
        };

        return {
            inject: function (inject) {
                injection = inject;
            }
            ,getInstance: function () {
                if (instance === null) {
                    instance = initInstance();
                }
                return instance;
            }
        };
    })();
})();

$(function() {
    MICROMOCKUP.Log.getInstance();
});
