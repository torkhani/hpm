import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProjectService {

  constructor(private _http: HttpClient) { }
  add(data: any): Observable <any> {
    return this._http.post('https://localhost/projects', data);
  }
  update(id: number, data: any): Observable <any> {
    return this._http.put(`https://localhost/projects/{id}`, data);
  }
  get(id: any): Observable <any> {
    return this._http.get(`https://localhost/projects/${id}`, {headers: new HttpHeaders({'Content-Type':'application/json;'})});
  }
  getList(params: any = {}): Observable <any> {
    return this._http.get('https://localhost/projects', { params: params, headers: new HttpHeaders({'Content-Type':'application/json;'})});
  }
  delete(id: number): Observable<any> {
    return this._http.delete(`https://localhost/projects/${id}`);
  }}
