/**
 * Created by Chris Rocco on 3/29/2017.
 */
angular
    .module('paper-coder')
    .directive('bdInputText', TextDirective);

function TextDirective( ) {
    return {
        restrict: 'E',
        scope: {
            metaData: "=meta",
            bindData: "=bind"
        },
        link: function(scope, element, attrs) {
        },
        template: `<div class="form-group">
                        <label class="control-label" <span ng-bind="metaData.question"></span></label>
                        <input ng-model="bindData.value"
                            ng-disabled="bindData.notReported"
                            placeholder="{[{metaData.placeholder}]}"
                        type="text" class="form-control" />
                      </div>`
    }
}