import { Injectable, EventEmitter } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class EventEmitterService {

  dataStr = new EventEmitter();

  constructor() { }

  sendCartData(data) {
    this.dataStr.emit(data);
  }
}
