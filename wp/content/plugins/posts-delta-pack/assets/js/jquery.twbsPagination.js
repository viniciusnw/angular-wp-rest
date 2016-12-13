/*!
 * jQuery pagination plugin v1.4.1
 * http://esimakin.github.io/twbs-pagination/
 *
 * Copyright 2014-2016, Eugene Simakin
 * Released under Apache 2.0 license
 * http://apache.org/licenses/LICENSE-2.0.html
 */
(function ($, window, document, undefined) {

    'use strict';

    var old = $.fn.twbsPagination;

    // PROTOTYPE AND CONSTRUCTOR

    var TwbsPagination = function (element, options) {
        this.$element = $(element);
        this.options = $.extend({}, $.fn.twbsPagination.defaults, options);

        if (this.options.startPage < 1 || this.options.startPage > this.options.totalPages) {
            throw new Error('Start page option is incorrect');
        }

        this.options.totalPages = parseInt(this.options.totalPages);
        if (isNaN(this.options.totalPages)) {
            throw new Error('Total pages option is not correct!');
        }

        this.options.visiblePages = parseInt(this.options.visiblePages);
        if (isNaN(this.options.visiblePages)) {
            throw new Error('Visible pages option is not correct!');
        }

        if (this.options.onPageClick instanceof Function) {
            this.$element.first().on('page', this.options.onPageClick);
        }

        // hide if only one page exists
        if (this.options.hideOnlyOnePage && this.options.totalPages == 1) {
            this.$element.trigger('page', 1);
            return this;
        }

        if (this.options.totalPages < this.options.visiblePages) {
            this.options.visiblePages = this.options.totalPages;
        }

        if (this.options.href) {
            this.options.startPage = this.getPageFromQueryString();
            if (!this.options.startPage) {
                this.options.startPage = 1;
            }
        }

        var tagName = (typeof this.$element.prop === 'function') ?
                this.$element.prop('tagName') : this.$element.attr('tagName');

        if (tagName === 'UL') {
            this.$listContainer = this.$element;
        } else {
            this.$listContainer = $('<ul></ul>');
        }

        this.$listContainer.addClass(this.options.paginationClass);

        if (tagName !== 'UL') {
            this.$element.append(this.$listContainer);
        }

        if (this.options.initiateStartPageClick) {
            this.show(this.options.startPage);
        } else {
            this.currentPage = this.options.startPage;
            this.render(this.getPages(this.options.startPage));
            this.setupEvents();
        }

        return this;
    };

    TwbsPagination.prototype = {
        constructor: TwbsPagination,
        destroy: function () {
            this.$element.empty();
            this.$element.removeData('twbs-pagination');
            this.$element.off('page');

            return this;
        },
        show: function (page) {
            if (page < 1 || page > this.options.totalPages) {
                throw new Error('Page is incorrect.');
            }
            this.currentPage = page;

            this.render(this.getPages(page));
            this.setupEvents();

            this.$element.trigger('page', page);

            return this;
        },
        enable: function () {
            this.show(this.currentPage);
        },
        disable: function () {
            var _this = this;
            this.$listContainer.off('click').on('click', 'li', function (evt) {
                evt.preventDefault();
            });
            this.$listContainer.children().each(function () {
                var $this = $(this);
                if (!$this.hasClass(_this.options.activeClass)) {
                    $(this).addClass(_this.options.disabledClass);
                }
            });
        },
        buildListItems: function (pages) {
            var listItems = [];

            if (this.options.first) {
                listItems.push(this.buildItem('first', 1));
            }

            if (this.options.prev) {
                var prev = pages.currentPage > 1 ? pages.currentPage - 1 : this.options.loop ? this.options.totalPages : 1;
                listItems.push(this.buildItem('prev', prev));
            }

            for (var i = 0; i < pages.numeric.length; i++) {
                listItems.push(this.buildItem('page', pages.numeric[i]));
            }

            if (this.options.next) {
                var next = pages.currentPage < this.options.totalPages ? pages.currentPage + 1 : this.options.loop ? 1 : this.options.totalPages;
                listItems.push(this.buildItem('next', next));
            }

            if (this.options.last) {
                listItems.push(this.buildItem('last', this.options.totalPages));
            }

            return listItems;
        },
        buildItem: function (type, page) {
            var $itemContainer = $('<li></li>'),
                    $itemContent = $('<a></a>'),
                    itemText = this.options[type] ? this.makeText(this.options[type], page) : page;

            $itemContainer.addClass(this.options[type + 'Class']);
            $itemContainer.data('page', page);
            $itemContainer.data('page-type', type);
            $itemContainer.append($itemContent.attr('href', this.makeHref(page)).addClass(this.options.anchorClass).html(itemText));

            return $itemContainer;
        },
        getPages: function (currentPage) {
            var pages = [];

            var half = Math.floor(this.options.visiblePages / 2);
            var start = currentPage - half + 1 - this.options.visiblePages % 2;
            var end = currentPage + half;

            // handle boundary case
            if (start <= 0) {
                start = 1;
                end = this.options.visiblePages;
            }
            if (end > this.options.totalPages) {
                start = this.options.totalPages - this.options.visiblePages + 1;
                end = this.options.totalPages;
            }

            var itPage = start;
            while (itPage <= end) {
                pages.push(itPage);
                itPage++;
            }

            return {"currentPage": currentPage, "numeric": pages};
        },
        render: function (pages) {
            var _this = this;
            this.$listContainer.children().remove();
            var items = this.buildListItems(pages);
            $.each(items, function (key, item) {
                _this.$listContainer.append(item);
            });

            this.$listContainer.children().each(function () {
                var $this = $(this),
                        pageType = $this.data('page-type');

                switch (pageType) {
                    case 'page':
                        if ($this.data('page') === pages.currentPage) {
                            $this.addClass(_this.options.activeClass);
                        }
                        break;
                    case 'first':
                        $this.toggleClass(_this.options.disabledClass, pages.currentPage === 1);
                        break;
                    case 'last':
                        $this.toggleClass(_this.options.disabledClass, pages.currentPage === _this.options.totalPages);
                        break;
                    case 'prev':
                        $this.toggleClass(_this.options.disabledClass, !_this.options.loop && pages.currentPage === 1);
                        break;
                    case 'next':
                        $this.toggleClass(_this.options.disabledClass,
                                !_this.options.loop && pages.currentPage === _this.options.totalPages);
                        break;
                    default:
                        break;
                }

            });
        },
        setupEvents: function () {
            var _this = this;
            this.$listContainer.off('click').on('click', 'li', function (evt) {
                var $this = $(this);
                if ($this.hasClass(_this.options.disabledClass) || $this.hasClass(_this.options.activeClass)) {
                    return false;
                }
                // Prevent click event if href is not set.
                !_this.options.href && evt.preventDefault();
                _this.show(parseInt($this.data('page')));
            });
        },
        makeHref: function (page) {
            return this.options.href ? this.generateQueryString(page) : "#";
        },
        makeText: function (text, page) {
            return text.replace(this.options.pageVariable, page)
                    .replace(this.options.totalPagesVariable, this.options.totalPages)
        },
        getPageFromQueryString: function (searchStr) {
            var search = this.getSearchString(searchStr),
                    regex = new RegExp(this.options.pageVariable + '(=([^&#]*)|&|#|$)'),
                    page = regex.exec(search);
            if (!page || !page[2]) {
                return null;
            }
            page = decodeURIComponent(page[2]);
            page = parseInt(page);
            if (isNaN(page)) {
                return null;
            }
            return page;
        },
        generateQueryString: function (pageNumber, searchStr) {
            var search = this.getSearchString(searchStr),
                    regex = new RegExp(this.options.pageVariable + '=*[^&#]*');
            if (!search)
                return '';
            return '?' + search.replace(regex, this.options.pageVariable + '=' + pageNumber);

        },
        getSearchString: function (searchStr) {
            var search = searchStr || window.location.search;
            if (search === '') {
                return null;
            }
            if (search.indexOf('?') === 0)
                search = search.substr(1);
            return search;
        },
        getCurrentPage: function () {
            return this.currentPage;
        }
    };

    // PLUGIN DEFINITION

    $.fn.twbsPagination = function (option) {
        var args = Array.prototype.slice.call(arguments, 1);
        var methodReturn;

        var $this = $(this);
        var data = $this.data('twbs-pagination');
        var options = typeof option === 'object' ? option : {};

        if (!data)
            $this.data('twbs-pagination', (data = new TwbsPagination(this, options)));
        if (typeof option === 'string')
            methodReturn = data[ option ].apply(data, args);

        return (methodReturn === undefined) ? $this : methodReturn;
    };

    $.fn.twbsPagination.defaults = {
        totalPages: 1,
        startPage: 1,
        visiblePages: 5,
        initiateStartPageClick: true,
        hideOnlyOnePage: false,
        href: false,
        pageVariable: '{{page}}',
        totalPagesVariable: '{{total_pages}}',
        page: null,
        first: 'First',
        prev: 'Previous',
        next: 'Next',
        last: 'Last',
        loop: false,
        onPageClick: null,
        paginationClass: 'pagination',
        nextClass: 'page-item next',
        prevClass: 'page-item prev',
        lastClass: 'page-item last',
        firstClass: 'page-item first',
        pageClass: 'page-item',
        activeClass: 'active',
        disabledClass: 'disabled',
        anchorClass: 'page-link'
    };

    $.fn.twbsPagination.Constructor = TwbsPagination;

    $.fn.twbsPagination.noConflict = function () {
        $.fn.twbsPagination = old;
        return this;
    };

    $.fn.twbsPagination.version = "1.4.1";
})(window.jQuery, window, document);


/**
 * simplePagination.js v1.6
 * A simple jQuery pagination plugin.
 * http://flaviusmatis.github.com/simplePagination.js/
 *
 * Copyright 2012, Flavius Matis
 * Released under the MIT license.
 * http://flaviusmatis.github.com/license.html
 */
(function ($) {

    var methods = {
        init: function (options) {
            var o = $.extend({
                items: 1,
                itemsOnPage: 1,
                pages: 0,
                displayedPages: 5,
                edges: 2,
                currentPage: 0,
                hrefTextPrefix: '#page-',
                hrefTextSuffix: '',
                prevText: 'Prev',
                nextText: 'Next',
                ellipseText: '&hellip;',
                ellipsePageSet: true,
                cssStyle: 'light-theme',
                listStyle: '',
                labelMap: [],
                selectOnClick: true,
                nextAtFront: false,
                invertPageOrder: false,
                useStartEdge: true,
                useEndEdge: true,
                onPageClick: function (pageNumber, event) {
                    // Callback triggered when a page is clicked
                    // Page number is given as an optional parameter
                },
                onInit: function () {
                    // Callback triggered immediately after initialization
                }
            }, options || {});

            var self = this;

            o.pages = o.pages ? o.pages : Math.ceil(o.items / o.itemsOnPage) ? Math.ceil(o.items / o.itemsOnPage) : 1;
            if (o.currentPage)
                o.currentPage = o.currentPage - 1;
            else
                o.currentPage = !o.invertPageOrder ? 0 : o.pages - 1;
            o.halfDisplayed = o.displayedPages / 2;

            this.each(function () {
                self.addClass(o.cssStyle + ' simple-pagination').data('pagination', o);
                methods._draw.call(self);
            });

            o.onInit();

            return this;
        },
        selectPage: function (page) {
            methods._selectPage.call(this, page - 1);
            return this;
        },
        prevPage: function () {
            var o = this.data('pagination');
            if (!o.invertPageOrder) {
                if (o.currentPage > 0) {
                    methods._selectPage.call(this, o.currentPage - 1);
                }
            } else {
                if (o.currentPage < o.pages - 1) {
                    methods._selectPage.call(this, o.currentPage + 1);
                }
            }
            return this;
        },
        nextPage: function () {
            var o = this.data('pagination');
            if (!o.invertPageOrder) {
                if (o.currentPage < o.pages - 1) {
                    methods._selectPage.call(this, o.currentPage + 1);
                }
            } else {
                if (o.currentPage > 0) {
                    methods._selectPage.call(this, o.currentPage - 1);
                }
            }
            return this;
        },
        getPagesCount: function () {
            return this.data('pagination').pages;
        },
        setPagesCount: function (count) {
            this.data('pagination').pages = count;
        },
        getCurrentPage: function () {
            return this.data('pagination').currentPage + 1;
        },
        destroy: function () {
            this.empty();
            return this;
        },
        drawPage: function (page) {
            var o = this.data('pagination');
            o.currentPage = page - 1;
            this.data('pagination', o);
            methods._draw.call(this);
            return this;
        },
        redraw: function () {
            methods._draw.call(this);
            return this;
        },
        disable: function () {
            var o = this.data('pagination');
            o.disabled = true;
            this.data('pagination', o);
            methods._draw.call(this);
            return this;
        },
        enable: function () {
            var o = this.data('pagination');
            o.disabled = false;
            this.data('pagination', o);
            methods._draw.call(this);
            return this;
        },
        updateItems: function (newItems) {
            var o = this.data('pagination');
            o.items = newItems;
            o.pages = methods._getPages(o);
            this.data('pagination', o);
            methods._draw.call(this);
        },
        updateItemsOnPage: function (itemsOnPage) {
            var o = this.data('pagination');
            o.itemsOnPage = itemsOnPage;
            o.pages = methods._getPages(o);
            this.data('pagination', o);
            methods._selectPage.call(this, 0);
            return this;
        },
        getItemsOnPage: function () {
            return this.data('pagination').itemsOnPage;
        },
        _draw: function () {
            var o = this.data('pagination'),
                    interval = methods._getInterval(o),
                    i,
                    tagName;

            methods.destroy.call(this);

            tagName = (typeof this.prop === 'function') ? this.prop('tagName') : this.attr('tagName');

            var $panel = tagName === 'UL' ? this : $('<ul' + (o.listStyle ? ' class="' + o.listStyle + '"' : '') + '></ul>').appendTo(this);

            // Generate Prev link
            if (o.prevText) {
                methods._appendItem.call(this, !o.invertPageOrder ? o.currentPage - 1 : o.currentPage + 1, {text: o.prevText, classes: 'prev'});
            }

            // Generate Next link (if option set for at front)
            if (o.nextText && o.nextAtFront) {
                methods._appendItem.call(this, !o.invertPageOrder ? o.currentPage + 1 : o.currentPage - 1, {text: o.nextText, classes: 'next'});
            }

            // Generate start edges
            if (!o.invertPageOrder) {
                if (interval.start > 0 && o.edges > 0) {
                    if (o.useStartEdge) {
                        var end = Math.min(o.edges, interval.start);
                        for (i = 0; i < end; i++) {
                            methods._appendItem.call(this, i);
                        }
                    }
                    if (o.edges < interval.start && (interval.start - o.edges != 1)) {
                        $panel.append('<li class="disabled"><span class="ellipse">' + o.ellipseText + '</span></li>');
                    } else if (interval.start - o.edges == 1) {
                        methods._appendItem.call(this, o.edges);
                    }
                }
            } else {
                if (interval.end < o.pages && o.edges > 0) {
                    if (o.useStartEdge) {
                        var begin = Math.max(o.pages - o.edges, interval.end);
                        for (i = o.pages - 1; i >= begin; i--) {
                            methods._appendItem.call(this, i);
                        }
                    }

                    if (o.pages - o.edges > interval.end && (o.pages - o.edges - interval.end != 1)) {
                        $panel.append('<li class="disabled"><span class="ellipse">' + o.ellipseText + '</span></li>');
                    } else if (o.pages - o.edges - interval.end == 1) {
                        methods._appendItem.call(this, interval.end);
                    }
                }
            }

            // Generate interval links
            if (!o.invertPageOrder) {
                for (i = interval.start; i < interval.end; i++) {
                    methods._appendItem.call(this, i);
                }
            } else {
                for (i = interval.end - 1; i >= interval.start; i--) {
                    methods._appendItem.call(this, i);
                }
            }

            // Generate end edges
            if (!o.invertPageOrder) {
                if (interval.end < o.pages && o.edges > 0) {
                    if (o.pages - o.edges > interval.end && (o.pages - o.edges - interval.end != 1)) {
                        $panel.append('<li class="disabled"><span class="ellipse">' + o.ellipseText + '</span></li>');
                    } else if (o.pages - o.edges - interval.end == 1) {
                        methods._appendItem.call(this, interval.end);
                    }
                    if (o.useEndEdge) {
                        var begin = Math.max(o.pages - o.edges, interval.end);
                        for (i = begin; i < o.pages; i++) {
                            methods._appendItem.call(this, i);
                        }
                    }
                }
            } else {
                if (interval.start > 0 && o.edges > 0) {
                    if (o.edges < interval.start && (interval.start - o.edges != 1)) {
                        $panel.append('<li class="disabled"><span class="ellipse">' + o.ellipseText + '</span></li>');
                    } else if (interval.start - o.edges == 1) {
                        methods._appendItem.call(this, o.edges);
                    }

                    if (o.useEndEdge) {
                        var end = Math.min(o.edges, interval.start);
                        for (i = end - 1; i >= 0; i--) {
                            methods._appendItem.call(this, i);
                        }
                    }
                }
            }

            // Generate Next link (unless option is set for at front)
            if (o.nextText && !o.nextAtFront) {
                methods._appendItem.call(this, !o.invertPageOrder ? o.currentPage + 1 : o.currentPage - 1, {text: o.nextText, classes: 'next'});
            }

            if (o.ellipsePageSet && !o.disabled) {
                methods._ellipseClick.call(this, $panel);
            }

        },
        _getPages: function (o) {
            var pages = Math.ceil(o.items / o.itemsOnPage);
            return pages || 1;
        },
        _getInterval: function (o) {
            return {
                start: Math.ceil(o.currentPage > o.halfDisplayed ? Math.max(Math.min(o.currentPage - o.halfDisplayed, (o.pages - o.displayedPages)), 0) : 0),
                end: Math.ceil(o.currentPage > o.halfDisplayed ? Math.min(o.currentPage + o.halfDisplayed, o.pages) : Math.min(o.displayedPages, o.pages))
            };
        },
        _appendItem: function (pageIndex, opts) {
            var self = this, options, $link, o = self.data('pagination'), $linkWrapper = $('<li></li>'), $ul = self.find('ul');

            pageIndex = pageIndex < 0 ? 0 : (pageIndex < o.pages ? pageIndex : o.pages - 1);

            options = {
                text: pageIndex + 1,
                classes: ''
            };

            if (o.labelMap.length && o.labelMap[pageIndex]) {
                options.text = o.labelMap[pageIndex];
            }

            options = $.extend(options, opts || {});

            if (pageIndex == o.currentPage || o.disabled) {
                if (o.disabled || options.classes === 'prev' || options.classes === 'next') {
                    $linkWrapper.addClass('disabled');
                } else {
                    $linkWrapper.addClass('active');
                }
                $link = $('<span class="current">' + (options.text) + '</span>');
            } else {
                $link = $('<a href="' + o.hrefTextPrefix + (pageIndex + 1) + o.hrefTextSuffix + '" class="page-link">' + (options.text) + '</a>');
                $link.click(function (event) {
                    return methods._selectPage.call(self, pageIndex, event);
                });
            }

            if (options.classes) {
                $link.addClass(options.classes);
            }

            $linkWrapper.append($link);

            if ($ul.length) {
                $ul.append($linkWrapper);
            } else {
                self.append($linkWrapper);
            }
        },
        _selectPage: function (pageIndex, event) {
            var o = this.data('pagination');
            o.currentPage = pageIndex;
            if (o.selectOnClick) {
                methods._draw.call(this);
            }
            return o.onPageClick(pageIndex + 1, event);
        },
        _ellipseClick: function ($panel) {
            var self = this,
                    o = this.data('pagination'),
                    $ellip = $panel.find('.ellipse');
            $ellip.addClass('clickable').parent().removeClass('disabled');
            $ellip.click(function (event) {
                if (!o.disable) {
                    var $this = $(this),
                            val = (parseInt($this.parent().prev().text(), 10) || 0) + 1;
                    $this
                            .html('<input type="number" min="1" max="' + o.pages + '" step="1" value="' + val + '">')
                            .find('input')
                            .focus()
                            .click(function (event) {
                                // prevent input number arrows from bubbling a click event on $ellip
                                event.stopPropagation();
                            })
                            .keyup(function (event) {
                                var val = $(this).val();
                                if (event.which === 13 && val !== '') {
                                    // enter to accept
                                    if ((val > 0) && (val <= o.pages))
                                        methods._selectPage.call(self, val - 1);
                                } else if (event.which === 27) {
                                    // escape to cancel
                                    $ellip.empty().html(o.ellipseText);
                                }
                            })
                            .bind('blur', function (event) {
                                var val = $(this).val();
                                if (val !== '') {
                                    methods._selectPage.call(self, val - 1);
                                }
                                $ellip.empty().html(o.ellipseText);
                                return false;
                            });
                }
                return false;
            });
        }

    };

    $.fn.pagination = function (method) {

        // Method calling logic
        if (methods[method] && method.charAt(0) != '_') {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.pagination');
        }

    };

})(jQuery);