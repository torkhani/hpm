import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TerritoryService {

  constructor(private _http: HttpClient) { }
  add(data: any): Observable <any> {
    return this._http.post('https://localhost/territories', data);
  }
  update(id: number, data: any): Observable <any> {
    return this._http.put(`https://localhost/territories/{id}`, data);
  }
  getList(params: any = {}): Observable <any> {
    return this._http.get('https://localhost/territories', { params: params, headers: new HttpHeaders({'Content-Type':'application/json;'})});
  }
  delete(id: number): Observable<any> {
    return this._http.delete(`https://localhost/territories/${id}`);
  }}
