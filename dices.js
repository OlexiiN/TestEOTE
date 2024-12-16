/***************/      
/* BABEL START */ 
/***************/  

"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Dice = function () {
    function Dice(max) {
        _classCallCheck(this, Dice);

        this.max = 6;
    }

    _createClass(Dice, [{
        key: "roll",
        value: function roll() {
            return Math.floor(Math.random() * this.max + 1);
        }
    }]);

    return Dice;
}();

/*
* Setback
*/
var Setback = function (_Dice) {
    _inherits(Setback, _Dice);

    function Setback(max) {
        _classCallCheck(this, Setback);

        var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(Setback).call(this, max));

        _this.max = 6;
        return _this;
    }

    _createClass(Setback, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                case 2:
                    return "blank";
                    break;
                case 3:
                case 4:
                    return "failure";
                    break;
                case 5:
                case 6:
                    return "threat";
                    break;
            }
        }
    }]);

    return Setback;
}(Dice);

/*
* Boost
*/
var Boost = function (_Dice2) {
    _inherits(Boost, _Dice2);

    function Boost(max) {
        _classCallCheck(this, Boost);

        var _this2 = _possibleConstructorReturn(this, Object.getPrototypeOf(Boost).call(this, max));

        _this2.max = 6;
        return _this2;
    }

    _createClass(Boost, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                case 2:
                    return "blank";
                    break;
                case 3:
                    return "success";
                    break;
                case 4:
                    return "success,advantage";
                    break;
                case 5:
                    return "advantage,advantage";
                    break;
                case 6:
                    return "advantage";
                    break;
            }
        }
    }]);

    return Boost;
}(Dice);

/*
* Ability
*/
var Ab = function (_Dice3) {
    _inherits(Ab, _Dice3);

    function Ab(max) {
        _classCallCheck(this, Ab);

        var _this3 = _possibleConstructorReturn(this, Object.getPrototypeOf(Ab).call(this, max));

        _this3.max = 8;
        return _this3;
    }

    _createClass(Ab, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                    return "blank";
                    break;
                case 2:
                case 3:
                    return "success";
                    break;
                case 4:
                    return "success,success";
                    break;
                case 5:
                case 6:
                    return "advantage";
                    break;
                case 7:
                    return "success,advantage";
                    break;
                case 8:
                    return "advantage,advantage";
                    break;
            }
        }
    }]);

    return Ab;
}(Dice);

/*
* Dificulty
*/
var Dif = function (_Dice4) {
    _inherits(Dif, _Dice4);

    function Dif(max) {
        _classCallCheck(this, Dif);

        var _this4 = _possibleConstructorReturn(this, Object.getPrototypeOf(Dif).call(this, max));

        _this4.max = 8;
        return _this4;
    }

    _createClass(Dif, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                    return "blank";
                    break;
                case 2:
                    return "failure";
                    break;
                case 3:
                    return "failure,failure";
                    break;
                case 4:
                case 5:
                case 6:
                    return "threat";
                    break;
                case 7:
                    return "threat,threat";
                    break;
                case 8:
                    return "failure,threat";
                    break;
            }
        }
    }]);

    return Dif;
}(Dice);

/*
* Proficiency
*/
var Prof = function (_Dice5) {
    _inherits(Prof, _Dice5);

    function Prof(max) {
        _classCallCheck(this, Prof);

        var _this5 = _possibleConstructorReturn(this, Object.getPrototypeOf(Prof).call(this, max));

        _this5.max = 12;
        return _this5;
    }

    _createClass(Prof, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                    return "blank";
                    break;
                case 2:
                case 3:
                    return "success";
                    break;
                case 4:
                case 5:
                    return "success,success";
                    break;
                case 6:
                    return "advantage";
                    break;
                case 7:
                case 8:
                case 9:
                    return "success,advatage";
                    break;
                case 10:
                case 11:
                    return "advantage,advantage";
                    break;
                case 12:
                    return "triumph";
                    break;
            }
        }
    }]);

    return Prof;
}(Dice);

/*
* Challenge
*/
var Ch = function (_Dice6) {
    _inherits(Ch, _Dice6);

    function Ch(max) {
        _classCallCheck(this, Ch);

        var _this6 = _possibleConstructorReturn(this, Object.getPrototypeOf(Ch).call(this, max));

        _this6.max = 12;
        return _this6;
    }

    _createClass(Ch, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                    return "blank";
                    break;
                case 2:
                case 3:
                    return "failure";
                    break;
                case 4:
                case 5:
                    return "failure,failure";
                    break;
                case 6:
                case 7:
                    return "threat";
                    break;
                case 8:
                case 9:
                    return "failure,threat";
                    break;
                case 10:
                case 11:
                    return "threat,threat";
                    break;
                case 12:
                    return "despair";
                    break;
            }
        }
    }]);

    return Ch;
}(Dice);

/*
* Challenge
*/
var Force = function (_Dice7) {
    _inherits(Force, _Dice7);

    function Force(max) {
        _classCallCheck(this, Force);

        var _this7 = _possibleConstructorReturn(this, Object.getPrototypeOf(Force).call(this, max));

        _this7.max = 12;
        return _this7;
    }

    _createClass(Force, [{
        key: "result",
        value: function result() {
            switch (this.roll()) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                    return "dark";
                    break;
                case 7:
                    return "dark,dark";
                    break;
                case 8:
                case 9:
                    return "light";
                    break;
                case 10:
                case 11:
                case 12:
                    return "light,light";
                    break;
            }
        }
    }]);

    return Force;
}(Dice);

/*************/    
/* BABEL END */
/*************/