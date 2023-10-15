/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Form masks Js File
*/

if (document.querySelector("#cleave-date")) {
    var cleaveDate = new Cleave('#cleave-date', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
}

if (document.querySelector("#cleave-date-format")) {
    var cleaveDateFormat = new Cleave('#cleave-date-format', {
        date: true,
        datePattern: ['m', 'y']
    });
}

if (document.querySelector("#time_format12")) {
    var cleaveTime = new Cleave('#time_format12', {
        time: true,
        timePattern: ['h', 'm', 's']
    });
}

if (document.querySelector("#cleave-time-format")) {
    var cleaveTimeFormat = new Cleave('#cleave-time-format', {
        time: true,
        timePattern: ['h', 'm']
    });
}

if (document.querySelector("#cleave-numeral")) {
    var cleaveNumeral = new Cleave('#cleave-numeral', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
}

if (document.querySelector("#cleave-ccard")) {
    var cleaveBlocks = new Cleave('#cleave-ccard', {
        blocks: [4, 4, 4, 4],
        uppercase: true
    });
}

if (document.querySelector("#cleave-delimiter")) {
    var cleaveDelimiter = new Cleave('#cleave-delimiter', {
        delimiter: '·',
        blocks: [3, 3, 3],
        uppercase: true
    });
}

if (document.querySelector("#cleave-delimiters")) {
    var cleaveDelimiters = new Cleave('#cleave-delimiters', {
        delimiters: ['.', '.', '-'],
        blocks: [3, 3, 3, 2],
        uppercase: true
    });
}

if (document.querySelector("#cleave-prefix")) {
    var cleavePrefix = new Cleave('#cleave-prefix', {
        prefix: 'PREFIX',
        delimiter: '-',
        blocks: [6, 4, 4, 4],
        uppercase: true
    });
}

if (document.querySelector("#telefono")) {
    var cleaveBlocks = new Cleave('#telefono', {
        delimiters: ['(', ')', '-'],
        blocks: [0, 3, 4, 4],
        numericOnly: true
    });
}
if (document.querySelector("#dui")) {
    var cleaveBlocks = new Cleave('#dui', {
        delimiters: ['-'],
        blocks: [8, 1],
        numericOnly: true
    });
}

