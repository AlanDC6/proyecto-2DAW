import { isPlatformBrowser, isPlatformServer } from '@angular/common';
import { Component, Directive, EventEmitter, forwardRef, Host, Inject, Input, Output, PLATFORM_ID } from '@angular/core';
import { NG_VALUE_ACCESSOR } from '@angular/forms';
import * as i0 from "@angular/core";
/**
 * Slick component
 */
export class SlickCarouselComponent {
    /**
     * Constructor
     */
    constructor(el, zone, platformId) {
        this.el = el;
        this.zone = zone;
        this.platformId = platformId;
        this.afterChange = new EventEmitter();
        this.beforeChange = new EventEmitter();
        this.breakpoint = new EventEmitter();
        this.destroy = new EventEmitter();
        this.init = new EventEmitter();
        // access from parent component can be a problem with change detection timing. Please use afterChange output
        this.currentIndex = 0;
        this.slides = [];
        this.initialized = false;
        this._removedSlides = [];
        this._addedSlides = [];
    }
    /**
     * On component destroy
     */
    ngOnDestroy() {
        this.unslick();
    }
    ngAfterViewInit() {
        this.ngAfterViewChecked();
    }
    /**
     * On component view checked
     */
    ngAfterViewChecked() {
        if (isPlatformServer(this.platformId)) {
            return;
        }
        if (this._addedSlides.length > 0 || this._removedSlides.length > 0) {
            const nextSlidesLength = this.slides.length - this._removedSlides.length + this._addedSlides.length;
            if (!this.initialized) {
                if (nextSlidesLength > 0) {
                    this.initSlick();
                }
                // if nextSlidesLength is zere, do nothing
            }
            else if (nextSlidesLength === 0) { // unslick case
                this.unslick();
            }
            else {
                this._addedSlides.forEach(slickItem => {
                    this.slides.push(slickItem);
                    this.zone.runOutsideAngular(() => {
                        this.$instance.slick('slickAdd', slickItem.el.nativeElement);
                    });
                });
                this._addedSlides = [];
                this._removedSlides.forEach(slickItem => {
                    const idx = this.slides.indexOf(slickItem);
                    this.slides = this.slides.filter(s => s !== slickItem);
                    this.zone.runOutsideAngular(() => {
                        this.$instance.slick('slickRemove', idx);
                    });
                });
                this._removedSlides = [];
            }
        }
    }
    /**
     * init slick
     */
    initSlick() {
        this.slides = this._addedSlides;
        this._addedSlides = [];
        this._removedSlides = [];
        this.zone.runOutsideAngular(() => {
            this.$instance = jQuery(this.el.nativeElement);
            this.$instance.on('init', (event, slick) => {
                this.zone.run(() => {
                    this.init.emit({ event, slick });
                });
            });
            this.$instance.slick(this.config);
            this.zone.run(() => {
                this.initialized = true;
                this.currentIndex = this.config?.initialSlide || 0;
            });
            this.$instance.on('afterChange', (event, slick, currentSlide) => {
                this.zone.run(() => {
                    this.afterChange.emit({
                        event,
                        slick,
                        currentSlide,
                        first: currentSlide === 0,
                        last: slick.$slides.length === currentSlide + slick.options.slidesToScroll
                    });
                    this.currentIndex = currentSlide;
                });
            });
            this.$instance.on('beforeChange', (event, slick, currentSlide, nextSlide) => {
                this.zone.run(() => {
                    this.beforeChange.emit({ event, slick, currentSlide, nextSlide });
                    this.currentIndex = nextSlide;
                });
            });
            this.$instance.on('breakpoint', (event, slick, breakpoint) => {
                this.zone.run(() => {
                    this.breakpoint.emit({ event, slick, breakpoint });
                });
            });
            this.$instance.on('destroy', (event, slick) => {
                this.zone.run(() => {
                    this.destroy.emit({ event, slick });
                    this.initialized = false;
                });
            });
        });
    }
    addSlide(slickItem) {
        this._addedSlides.push(slickItem);
    }
    removeSlide(slickItem) {
        this._removedSlides.push(slickItem);
    }
    /**
     * Slick Method
     */
    slickGoTo(index) {
        this.zone.runOutsideAngular(() => {
            this.$instance.slick('slickGoTo', index);
        });
    }
    slickNext() {
        this.zone.runOutsideAngular(() => {
            this.$instance.slick('slickNext');
        });
    }
    slickPrev() {
        this.zone.runOutsideAngular(() => {
            this.$instance.slick('slickPrev');
        });
    }
    slickPause() {
        this.zone.runOutsideAngular(() => {
            this.$instance.slick('slickPause');
        });
    }
    slickPlay() {
        this.zone.runOutsideAngular(() => {
            this.$instance.slick('slickPlay');
        });
    }
    unslick() {
        if (this.$instance) {
            this.zone.runOutsideAngular(() => {
                this.$instance.slick('unslick');
            });
            this.$instance = undefined;
        }
        this.initialized = false;
    }
    ngOnChanges(changes) {
        if (this.initialized) {
            const config = changes['config'];
            if (config.previousValue !== config.currentValue && config.currentValue !== undefined) {
                const refresh = config.currentValue['refresh'];
                const newOptions = Object.assign({}, config.currentValue);
                delete newOptions['refresh'];
                this.zone.runOutsideAngular(() => {
                    this.$instance.slick('slickSetOption', newOptions, refresh);
                });
            }
        }
    }
}
/** @nocollapse */ SlickCarouselComponent.ɵfac = i0.ɵɵngDeclareFactory({ minVersion: "12.0.0", version: "13.3.2", ngImport: i0, type: SlickCarouselComponent, deps: [{ token: i0.ElementRef }, { token: i0.NgZone }, { token: PLATFORM_ID }], target: i0.ɵɵFactoryTarget.Component });
/** @nocollapse */ SlickCarouselComponent.ɵcmp = i0.ɵɵngDeclareComponent({ minVersion: "12.0.0", version: "13.3.2", type: SlickCarouselComponent, selector: "ngx-slick-carousel", inputs: { config: "config" }, outputs: { afterChange: "afterChange", beforeChange: "beforeChange", breakpoint: "breakpoint", destroy: "destroy", init: "init" }, providers: [{
            provide: NG_VALUE_ACCESSOR,
            useExisting: forwardRef((() => SlickCarouselComponent)),
            multi: true
        }], exportAs: ["slick-carousel"], usesOnChanges: true, ngImport: i0, template: '<ng-content></ng-content>', isInline: true });
i0.ɵɵngDeclareClassMetadata({ minVersion: "12.0.0", version: "13.3.2", ngImport: i0, type: SlickCarouselComponent, decorators: [{
            type: Component,
            args: [{
                    selector: 'ngx-slick-carousel',
                    exportAs: 'slick-carousel',
                    providers: [{
                            provide: NG_VALUE_ACCESSOR,
                            useExisting: forwardRef((() => SlickCarouselComponent)),
                            multi: true
                        }],
                    template: '<ng-content></ng-content>',
                }]
        }], ctorParameters: function () { return [{ type: i0.ElementRef }, { type: i0.NgZone }, { type: undefined, decorators: [{
                    type: Inject,
                    args: [PLATFORM_ID]
                }] }]; }, propDecorators: { config: [{
                type: Input
            }], afterChange: [{
                type: Output
            }], beforeChange: [{
                type: Output
            }], breakpoint: [{
                type: Output
            }], destroy: [{
                type: Output
            }], init: [{
                type: Output
            }] } });
export class SlickItemDirective {
    constructor(el, platformId, carousel) {
        this.el = el;
        this.platformId = platformId;
        this.carousel = carousel;
    }
    ngOnInit() {
        if (isPlatformBrowser(this.platformId)) {
            this.carousel.addSlide(this);
        }
    }
    ngOnDestroy() {
        if (isPlatformBrowser(this.platformId)) {
            this.carousel.removeSlide(this);
        }
    }
}
/** @nocollapse */ SlickItemDirective.ɵfac = i0.ɵɵngDeclareFactory({ minVersion: "12.0.0", version: "13.3.2", ngImport: i0, type: SlickItemDirective, deps: [{ token: i0.ElementRef }, { token: PLATFORM_ID }, { token: SlickCarouselComponent, host: true }], target: i0.ɵɵFactoryTarget.Directive });
/** @nocollapse */ SlickItemDirective.ɵdir = i0.ɵɵngDeclareDirective({ minVersion: "12.0.0", version: "13.3.2", type: SlickItemDirective, selector: "[ngxSlickItem]", ngImport: i0 });
i0.ɵɵngDeclareClassMetadata({ minVersion: "12.0.0", version: "13.3.2", ngImport: i0, type: SlickItemDirective, decorators: [{
            type: Directive,
            args: [{
                    selector: '[ngxSlickItem]',
                }]
        }], ctorParameters: function () { return [{ type: i0.ElementRef }, { type: undefined, decorators: [{
                    type: Inject,
                    args: [PLATFORM_ID]
                }] }, { type: SlickCarouselComponent, decorators: [{
                    type: Host
                }] }]; } });
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic2xpY2suY29tcG9uZW50LmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiLi4vLi4vc3JjL3NsaWNrLmNvbXBvbmVudC50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSxPQUFPLEVBQUUsaUJBQWlCLEVBQUUsZ0JBQWdCLEVBQUUsTUFBTSxpQkFBaUIsQ0FBQztBQUN0RSxPQUFPLEVBR0wsU0FBUyxFQUNULFNBQVMsRUFFVCxZQUFZLEVBQ1osVUFBVSxFQUNWLElBQUksRUFDSixNQUFNLEVBQ04sS0FBSyxFQUtMLE1BQU0sRUFDTixXQUFXLEVBRVosTUFBTSxlQUFlLENBQUM7QUFDdkIsT0FBTyxFQUFFLGlCQUFpQixFQUFFLE1BQU0sZ0JBQWdCLENBQUM7O0FBSW5EOztHQUVHO0FBV0gsTUFBTSxPQUFPLHNCQUFzQjtJQW1CakM7O09BRUc7SUFDSCxZQUFvQixFQUFjLEVBQ2QsSUFBWSxFQUNTLFVBQWtCO1FBRnZDLE9BQUUsR0FBRixFQUFFLENBQVk7UUFDZCxTQUFJLEdBQUosSUFBSSxDQUFRO1FBQ1MsZUFBVSxHQUFWLFVBQVUsQ0FBUTtRQXJCL0MsZ0JBQVcsR0FBa0csSUFBSSxZQUFZLEVBQUUsQ0FBQztRQUNoSSxpQkFBWSxHQUFzRixJQUFJLFlBQVksRUFBRSxDQUFDO1FBQ3JILGVBQVUsR0FBOEQsSUFBSSxZQUFZLEVBQUUsQ0FBQztRQUMzRixZQUFPLEdBQTZDLElBQUksWUFBWSxFQUFFLENBQUM7UUFDdkUsU0FBSSxHQUE2QyxJQUFJLFlBQVksRUFBRSxDQUFDO1FBSWhGLDRHQUE0RztRQUNwRyxpQkFBWSxHQUFHLENBQUMsQ0FBQztRQUVsQixXQUFNLEdBQVUsRUFBRSxDQUFDO1FBQ25CLGdCQUFXLEdBQUcsS0FBSyxDQUFDO1FBQ25CLG1CQUFjLEdBQXlCLEVBQUUsQ0FBQztRQUMxQyxpQkFBWSxHQUF5QixFQUFFLENBQUM7SUFRaEQsQ0FBQztJQUVEOztPQUVHO0lBQ0gsV0FBVztRQUNULElBQUksQ0FBQyxPQUFPLEVBQUUs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QUFNOzJCQUFDLFdBQVc7NENBdEJwQixNQUFNO3NCQUFkLEtBQUs7Z0JBQ0ksV0FBVztzQkFBcEIsTUFBTTtnQkFDRyxZQUFZO3NCQUFyQixNQUFNO2dCQUNHLFVBQVU7c0JBQW5CLE1BQU07Z0JBQ0csT0FBTztzQkFBaEIsTUFBTTtnQkFDRyxJQUFJO3NCQUFiLE1BQU07O0FBc01YLE1BQU0sT0FBTyxrQkFBa0I7SUFDN0IsWUFBbUIsRUFBYyxFQUNRLFVBQWtCLEVBQy9CLFFBQWdDO1FBRnpDLE9BQUUsR0FBRixFQUFFLENBQVk7UUFDUSxlQUFVLEdBQVYsVUFBVSxDQUFRO1FBQy9CLGFBQVEsR0FBUixRQUFRLENBQXdCO0lBQzVELENBQUM7SUFFRCxRQUFRO1FBQ04sSUFBSSxpQkFBaUIsQ0FBQyxJQUFJLENBQUMsVUFBVSxDQUFDLEVBQUU7WUFDdEMsSUFBSSxDQUFDLFFBQVEsQ0FBQyxRQUFRLENBQUMsSUFBSSxDQUFDLENBQUM7U0FDOUI7SUFDSCxDQUFDO0lBRUQsV0FBVztRQUNULElBQUksaUJBQWlCLENBQUMsSUFBSSxDQUFDLFVBQVUsQ0FBQyxFQUFFO1lBQ3RDLElBQUksQ0FBQyxRQUFRLENBQUMsV0FBVyxDQUFDLElBQUksQ0FBQyxDQUFDO1NBQ2pDO0lBQ0gsQ0FBQzs7a0lBaEJVLGtCQUFrQiw0Q0FFVCxXQUFXLGFBQ08sc0JBQXNCO3NIQUhqRCxrQkFBa0I7MkZBQWxCLGtCQUFrQjtrQkFIOUIsU0FBUzttQkFBQztvQkFDVCxRQUFRLEVBQUUsZ0JBQWdCO2lCQUMzQjs7MEJBR2MsTUFBTTsyQkFBQyxXQUFXOzhCQUNPLHNCQUFzQjswQkFBL0MsSUFBSSIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IGlzUGxhdGZvcm1Ccm93c2VyLCBpc1BsYXRmb3JtU2VydmVyIH0gZnJvbSAnQGFuZ3VsYXIvY29tbW9uJztcbmltcG9ydCB7XG4gIEFmdGVyVmlld0NoZWNrZWQsXG4gIEFmdGVyVmlld0luaXQsXG4gIENvbXBvbmVudCxcbiAgRGlyZWN0aXZlLFxuICBFbGVtZW50UmVmLFxuICBFdmVudEVtaXR0ZXIsXG4gIGZvcndhcmRSZWYsXG4gIEhvc3QsXG4gIEluamVjdCxcbiAgSW5wdXQsXG4gIE5nWm9uZSxcbiAgT25DaGFuZ2VzLFxuICBPbkRlc3Ryb3ksXG4gIE9uSW5pdCxcbiAgT3V0cHV0LFxuICBQTEFURk9STV9JRCxcbiAgU2ltcGxlQ2hhbmdlc1xufSBmcm9tICdAYW5ndWxhci9jb3JlJztcbmltcG9ydCB7IE5HX1ZBTFVFX0FDQ0VTU09SIH0gZnJvbSAnQGFuZ3VsYXIvZm9ybXMnO1xuXG5kZWNsYXJlIGNvbnN0IGpRdWVyeTogYW55O1xuXG4vKipcbiAqIFNsaWNrIGNvbXBvbmVudFxuICovXG5AQ29tcG9uZW50KHtcbiAgc2VsZWN0b3I6ICduZ3gtc2xpY2stY2Fyb3VzZWwnLFxuICBleHBvcnRBczogJ3NsaWNrLWNhcm91c2VsJyxcbiAgcHJvdmlkZXJzOiBbe1xuICAgIHByb3ZpZGU6IE5HX1ZBTFVFX0FDQ0VTU09SLFxuICAgIHVzZUV4aXN0aW5nOiBmb3J3YXJkUmVmKCgpID0+IFNsaWNrQ2Fyb3VzZWxDb21wb25lbnQpLFxuICAgIG11bHRpOiB0cnVlXG4gIH1dLFxuICB0ZW1wbGF0ZTogJzxuZy1jb250ZW50PjwvbmctY29udGVudD4nLFxufSlcbmV4cG9ydCBjbGFzcyBTbGlja0Nhcm91c2VsQ29tcG9uZW50IGltcGxlbWVudHMgT25EZXN0cm95LCBPbkNoYW5nZXMsIEFmdGVyVmlld0luaXQsIEFmdGVyVmlld0NoZWNrZWQge1xuXG4gICAgQElucHV0KCkgY29uZmlnOiBhbnk7XG4gICAgQE91dHB1dCgpIGFmdGVyQ2hhbmdlOiBFdmVudEVtaXR0ZXI8eyBldmVudDogYW55LCBzbGljazogYW55LCBjdXJyZW50U2xpZGU6IG51bWJlciwgZmlyc3Q6IGJvb2xlYW4sIGxhc3Q6IGJvb2xlYW4gfT4gPSBuZXcgRXZlbnRFbWl0dGVyKCk7XG4gICAgQE91dHB1dCgpIGJlZm9yZUNoYW5nZTogRXZlbnRFbWl0dGVyPHsgZXZlbnQ6IGFueSwgc2xpY2s6IGFueSwgY3VycmVudFNsaWRlOiBudW1iZXIsIG5leHRTbGlkZTogbnVtYmVyIH0+ID0gbmV3IEV2ZW50RW1pdHRlcigpO1xuICAgIEBPdXRwdXQoKSBicmVha3BvaW50OiBFdmVudEVtaXR0ZXI8eyBldmVudDogYW55LCBzbGljazogYW55LCBicmVha3BvaW50OiBhbnkgfT4gPSBuZXcgRXZlbnRFbWl0dGVyKCk7XG4gICAgQE91dHB1dCgpIGRlc3Ryb3k6IEV2ZW50RW1pdHRlcjx7IGV2ZW50OiBhbnksIHNsaWNrOiBhbnkgfT4gPSBuZXcgRXZlbnRFbWl0dGVyKCk7XG4gICAgQE91dHB1dCgpIGluaXQ6IEV2ZW50RW1pdHRlcjx7IGV2ZW50OiBhbnksIHNsaWNrOiBhbnkgfT4gPSBuZXcgRXZlbnRFbWl0dGVyKCk7XG5cbiAgcHVibGljICRpbnN0YW5jZTogYW55O1xuXG4gIC8vIGFjY2VzcyBmcm9tIHBhcmVudCBjb21wb25lbnQgY2FuIGJlIGEgcHJvYmxlbSB3aXRoIGNoYW5nZSBkZXRlY3Rpb24gdGltaW5nLiBQbGVhc2UgdXNlIGFmdGVyQ2hhbmdlIG91dHB1dFxuICBwcml2YXRlIGN1cnJlbnRJbmRleCA9IDA7XG5cbiAgcHVibGljIHNsaWRlczogYW55W10gPSBbXTtcbiAgcHVibGljIGluaXRpYWxpemVkID0gZmFsc2U7XG4gIHByaXZhdGUgX3JlbW92ZWRTbGlkZXM6IFNsaWNrSXRlbURpcmVjdGl2ZVtdID0gW107XG4gIHByaXZhdGUgX2FkZGVkU2xpZGVzOiBTbGlja0l0ZW1EaXJlY3RpdmVbXSA9IFtdO1xuXG4gIC8qKlxuICAgKiBDb25zdHJ1Y3RvclxuICAgKi9cbiAgY29uc3RydWN0b3IocHJpdmF0ZSBlbDogRWxlbWVudFJlZixcbiAgICAgICAgICAgICAgcHJpdmF0ZSB6b25lOiBOZ1pvbmUsXG4gICAgICAgICAgICAgIEBJbmplY3QoUExBVEZPUk1fSUQpIHByaXZhdGUgcGxhdGZvcm1JZDogc3RyaW5nKSB7XG4gIH1cblxuICAvKipcbiAgICogT24gY29tcG9uZW50IGRlc3Ryb3lcbiAgICovXG4gIG5nT25EZXN0cm95KCkge1xuICAgIHRoaXMudW5zbGljaygpO1xuICB9XG5cbiAgbmdBZnRlclZpZXdJbml0KCk6IHZvaWQge1xuICAgIHRoaXMubmdBZnRlclZpZXdDaGVja2VkKCk7XG4gIH1cblxuICAvKipcbiAgICogT24gY29tcG9uZW50IHZpZXcgY2hlY2tlZFxuICAgKi9cbiAgbmdBZnRlclZpZXdDaGVja2VkKCkge1xuICAgIGlmIChpc1BsYXRmb3JtU2VydmVyKHRoaXMucGxhdGZvcm1JZCkpIHtcbiAgICAgIHJldHVybjtcbiAgICB9XG4gICAgaWYgKHRoaXMuX2FkZGVkU2xpZGVzLmxlbmd0aCA+IDAgfHwgdGhpcy5fcmVtb3ZlZFNsaWRlcy5sZW5ndGggPiAwKSB7XG4gICAgICBjb25zdCBuZXh0U2xpZGVzTGVuZ3RoID0gdGhpcy5zbGlkZXMubGVuZ3RoIC0gdGhpcy5fcmVtb3ZlZFNsaWRlcy5sZW5ndGggKyB0aGlzLl9hZGRlZFNsaWRlcy5sZW5ndGg7XG4gICAgICBpZiAoIXRoaXMuaW5pdGlhbGl6ZWQpIHtcbiAgICAgICAgaWYgKG5leHRTbGlkZXNMZW5ndGggPiAwKSB7XG4gICAgICAgICAgdGhpcy5pbml0U2xpY2soKTtcbiAgICAgICAgfVxuICAgICAgICAvLyBpZiBuZXh0U2xpZGVzTGVuZ3RoIGlzIHplcmUsIGRvIG5vdGhpbmdcbiAgICAgIH0gZWxzZSBpZiAobmV4dFNsaWRlc0xlbmd0aCA9PT0gMCkgeyAvLyB1bnNsaWNrIGNhc2VcbiAgICAgICAgdGhpcy51bnNsaWNrKCk7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICB0aGlzLl9hZGRlZFNsaWRlcy5mb3JFYWNoKHNsaWNrSXRlbSA9PiB7XG4gICAgICAgICAgdGhpcy5zbGlkZXMucHVzaChzbGlja0l0ZW0pO1xuICAgICAgICAgIHRoaXMuem9uZS5ydW5PdXRzaWRlQW5ndWxhcigoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLiRpbnN0YW5jZS5zbGljaygnc2xpY2tBZGQnLCBzbGlja0l0ZW0uZWwubmF0aXZlRWxlbWVudCk7XG4gICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgICAgICB0aGlzLl9hZGRlZFNsaWRlcyA9IFtdO1xuXG4gICAgICAgIHRoaXMuX3JlbW92ZWRTbGlkZXMuZm9yRWFjaChzbGlja0l0ZW0gPT4ge1xuICAgICAgICAgIGNvbnN0IGlkeCA9IHRoaXMuc2xpZGVzLmluZGV4T2Yoc2xpY2tJdGVtKTtcbiAgICAgICAgICB0aGlzLnNsaWRlcyA9IHRoaXMuc2xpZGVzLmZpbHRlcihzID0+IHMgIT09IHNsaWNrSXRlbSk7XG4gICAgICAgICAgdGhpcy56b25lLnJ1bk91dHNpZGVBbmd1bGFyKCgpID0+IHtcbiAgICAgICAgICAgIHRoaXMuJGluc3RhbmNlLnNsaWNrKCdzbGlja1JlbW92ZScsIGlkeCk7XG4gICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgICAgICB0aGlzLl9yZW1vdmVkU2xpZGVzID0gW107XG4gICAgICB9XG4gICAgfVxuICB9XG5cbiAgLyoqXG4gICAqIGluaXQgc2xpY2tcbiAgICovXG4gIGluaXRTbGljaygpIHtcbiAgICB0aGlzLnNsaWRlcyA9IHRoaXMuX2FkZGVkU2xpZGVzO1xuICAgIHRoaXMuX2FkZGVkU2xpZGVzID0gW107XG4gICAgdGhpcy5fcmVtb3ZlZFNsaWRlcyA9IFtdO1xuICAgIHRoaXMuem9uZS5ydW5PdXRzaWRlQW5ndWxhcigoKSA9PiB7XG4gICAgICB0aGlzLiRpbnN0YW5jZSA9IGpRdWVyeSh0aGlzLmVsLm5hdGl2ZUVsZW1lbnQpO1xuXG4gICAgICB0aGlzLiRpbnN0YW5jZS5vbignaW5pdCcsIChldmVudCwgc2xpY2spID0+IHtcbiAgICAgICAgdGhpcy56b25lLnJ1bigoKSA9PiB7XG4gICAgICAgICAgdGhpcy5pbml0LmVtaXQoeyBldmVudCwgc2xpY2sgfSk7XG4gICAgICAgIH0pO1xuICAgICAgfSk7XG5cbiAgICAgIHRoaXMuJGluc3RhbmNlLnNsaWNrKHRoaXMuY29uZmlnKTtcblxuICAgICAgdGhpcy56b25lLnJ1bigoKSA9PiB7XG4gICAgICAgIHRoaXMuaW5pdGlhbGl6ZWQgPSB0cnVlO1xuXG4gICAgICAgIHRoaXMuY3VycmVudEluZGV4ID0gdGhpcy5jb25maWc/LmluaXRpYWxTbGlkZSB8fCAwO1xuICAgICAgfSk7XG5cbiAgICAgIHRoaXMuJGluc3RhbmNlLm9uKCdhZnRlckNoYW5nZScsIChldmVudCwgc2xpY2ssIGN1cnJlbnRTbGlkZSkgPT4ge1xuICAgICAgICB0aGlzLnpvbmUucnVuKCgpID0+IHtcbiAgICAgICAgICAgIHRoaXMuYWZ0ZXJDaGFuZ2UuZW1pdCh7XG4gICAgICAgICAgICAgICAgZXZlbnQsXG4gICAgICAgICAgICAgICAgc2xpY2ssXG4gICAgICAgICAgICAgICAgY3VycmVudFNsaWRlLFxuICAgICAgICAgICAgICAgIGZpcnN0OiBjdXJyZW50U2xpZGUgPT09IDAsXG4gICAgICAgICAgICAgICAgbGFzdDogc2xpY2suJHNsaWRlcy5sZW5ndGggPT09IGN1cnJlbnRTbGlkZSArIHNsaWNrLm9wdGlvbnMuc2xpZGVzVG9TY3JvbGxcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgdGhpcy5jdXJyZW50SW5kZXggPSBjdXJyZW50U2xpZGU7XG4gICAgICAgIH0pO1xuICAgICAgfSk7XG5cbiAgICAgIHRoaXMuJGluc3RhbmNlLm9uKCdiZWZvcmVDaGFuZ2UnLCAoZXZlbnQsIHNsaWNrLCBjdXJyZW50U2xpZGUsIG5leHRTbGlkZSkgPT4ge1xuICAgICAgICB0aGlzLnpvbmUucnVuKCgpID0+IHtcbiAgICAgICAgICB0aGlzLmJlZm9yZUNoYW5nZS5lbWl0KHsgZXZlbnQsIHNsaWNrLCBjdXJyZW50U2xpZGUsIG5leHRTbGlkZSB9KTtcbiAgICAgICAgICB0aGlzLmN1cnJlbnRJbmRleCA9IG5leHRTbGlkZTtcbiAgICAgICAgfSk7XG4gICAgICB9KTtcblxuICAgICAgdGhpcy4kaW5zdGFuY2Uub24oJ2JyZWFrcG9pbnQnLCAoZXZlbnQsIHNsaWNrLCBicmVha3BvaW50KSA9PiB7XG4gICAgICAgIHRoaXMuem9uZS5ydW4oKCkgPT4ge1xuICAgICAgICAgIHRoaXMuYnJlYWtwb2ludC5lbWl0KHsgZXZlbnQsIHNsaWNrLCBicmVha3BvaW50IH0pO1xuICAgICAgICB9KTtcbiAgICAgIH0pO1xuXG4gICAgICB0aGlzLiRpbnN0YW5jZS5vbignZGVzdHJveScsIChldmVudCwgc2xpY2spID0+IHtcbiAgICAgICAgdGhpcy56b25lLnJ1bigoKSA9PiB7XG4gICAgICAgICAgdGhpcy5kZXN0cm95LmVtaXQoeyBldmVudCwgc2xpY2sgfSk7XG4gICAgICAgICAgdGhpcy5pbml0aWFsaXplZCA9IGZhbHNlO1xuICAgICAgICB9KTtcbiAgICAgIH0pO1xuICAgIH0pO1xuICB9XG5cbiAgYWRkU2xpZGUoc2xpY2tJdGVtOiBTbGlja0l0ZW1EaXJlY3RpdmUpIHtcbiAgICB0aGlzLl9hZGRlZFNsaWRlcy5wdXNoKHNsaWNrSXRlbSk7XG4gIH1cblxuICByZW1vdmVTbGlkZShzbGlja0l0ZW06IFNsaWNrSXRlbURpcmVjdGl2ZSkge1xuICAgIHRoaXMuX3JlbW92ZWRTbGlkZXMucHVzaChzbGlja0l0ZW0pO1xuICB9XG5cbiAgLyoqXG4gICAqIFNsaWNrIE1ldGhvZFxuICAgKi9cbiAgcHVibGljIHNsaWNrR29UbyhpbmRleDogbnVtYmVyKSB7XG4gICAgdGhpcy56b25lLnJ1bk91dHNpZGVBbmd1bGFyKCgpID0+IHtcbiAgICAgIHRoaXMuJGluc3RhbmNlLnNsaWNrKCdzbGlja0dvVG8nLCBpbmRleCk7XG4gICAgfSk7XG4gIH1cblxuICBwdWJsaWMgc2xpY2tOZXh0KCkge1xuICAgIHRoaXMuem9uZS5ydW5PdXRzaWRlQW5ndWxhcigoKSA9PiB7XG4gICAgICB0aGlzLiRpbnN0YW5jZS5zbGljaygnc2xpY2tOZXh0Jyk7XG4gICAgfSk7XG4gIH1cblxuICBwdWJsaWMgc2xpY2tQcmV2KCkge1xuICAgIHRoaXMuem9uZS5ydW5PdXRzaWRlQW5ndWxhcigoKSA9PiB7XG4gICAgICB0aGlzLiRpbnN0YW5jZS5zbGljaygnc2xpY2tQcmV2Jyk7XG4gICAgfSk7XG4gIH1cblxuICBwdWJsaWMgc2xpY2tQYXVzZSgpIHtcbiAgICB0aGlzLnpvbmUucnVuT3V0c2lkZUFuZ3VsYXIoKCkgPT4ge1xuICAgICAgdGhpcy4kaW5zdGFuY2Uuc2xpY2soJ3NsaWNrUGF1c2UnKTtcbiAgICB9KTtcbiAgfVxuXG4gIHB1YmxpYyBzbGlja1BsYXkoKSB7XG4gICAgdGhpcy56b25lLnJ1bk91dHNpZGVBbmd1bGFyKCgpID0+IHtcbiAgICAgIHRoaXMuJGluc3RhbmNlLnNsaWNrKCdzbGlja1BsYXknKTtcbiAgICB9KTtcbiAgfVxuXG4gIHB1YmxpYyB1bnNsaWNrKCkge1xuICAgIGlmICh0aGlzLiRpbnN0YW5jZSkge1xuICAgICAgdGhpcy56b25lLnJ1bk91dHNpZGVBbmd1bGFyKCgpID0+IHtcbiAgICAgICAgdGhpcy4kaW5zdGFuY2Uuc2xpY2soJ3Vuc2xpY2snKTtcbiAgICAgIH0pO1xuICAgICAgdGhpcy4kaW5zdGFuY2UgPSB1bmRlZmluZWQ7XG4gICAgfVxuICAgIHRoaXMuaW5pdGlhbGl6ZWQgPSBmYWxzZTtcbiAgfVxuXG4gIG5nT25DaGFuZ2VzKGNoYW5nZXM6IFNpbXBsZUNoYW5nZXMpOiB2b2lkIHtcbiAgICBpZiAodGhpcy5pbml0aWFsaXplZCkge1xuICAgICAgY29uc3QgY29uZmlnID0gY2hhbmdlc1snY29uZmlnJ107XG4gICAgICBpZiAoY29uZmlnLnByZXZpb3VzVmFsdWUgIT09IGNvbmZpZy5jdXJyZW50VmFsdWUgJiYgY29uZmlnLmN1cnJlbnRWYWx1ZSAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgIGNvbnN0IHJlZnJlc2ggPSBjb25maWcuY3VycmVudFZhbHVlWydyZWZyZXNoJ107XG4gICAgICAgIGNvbnN0IG5ld09wdGlvbnMgPSBPYmplY3QuYXNzaWduKHt9LCBjb25maWcuY3VycmVudFZhbHVlKTtcbiAgICAgICAgZGVsZXRlIG5ld09wdGlvbnNbJ3JlZnJlc2gnXTtcblxuICAgICAgICB0aGlzLnpvbmUucnVuT3V0c2lkZUFuZ3VsYXIoKCkgPT4ge1xuICAgICAgICAgIHRoaXMuJGluc3RhbmNlLnNsaWNrKCdzbGlja1NldE9wdGlvbicsIG5ld09wdGlvbnMsIHJlZnJlc2gpO1xuICAgICAgICB9KTtcbiAgICAgIH1cbiAgICB9XG4gIH1cblxufVxuXG5ARGlyZWN0aXZlKHtcbiAgc2VsZWN0b3I6ICdbbmd4U2xpY2tJdGVtXScsXG59KVxuZXhwb3J0IGNsYXNzIFNsaWNrSXRlbURpcmVjdGl2ZSBpbXBsZW1lbnRzIE9uSW5pdCwgT25EZXN0cm95IHtcbiAgY29uc3RydWN0b3IocHVibGljIGVsOiBFbGVtZW50UmVmLFxuICAgICAgICAgICAgICBASW5qZWN0KFBMQVRGT1JNX0lEKSBwcml2YXRlIHBsYXRmb3JtSWQ6IHN0cmluZyxcbiAgICAgICAgICAgICAgQEhvc3QoKSBwcml2YXRlIGNhcm91c2VsOiBTbGlja0Nhcm91c2VsQ29tcG9uZW50KSB7XG4gIH1cblxuICBuZ09uSW5pdCgpIHtcbiAgICBpZiAoaXNQbGF0Zm9ybUJyb3dzZXIodGhpcy5wbGF0Zm9ybUlkKSkge1xuICAgICAgdGhpcy5jYXJvdXNlbC5hZGRTbGlkZSh0aGlzKTtcbiAgICB9XG4gIH1cblxuICBuZ09uRGVzdHJveSgpIHtcbiAgICBpZiAoaXNQbGF0Zm9ybUJyb3dzZXIodGhpcy5wbGF0Zm9ybUlkKSkge1xuICAgICAgdGhpcy5jYXJvdXNlbC5yZW1vdmVTbGlkZSh0aGlzKTtcbiAgICB9XG4gIH1cbn1cbiJdfQ==