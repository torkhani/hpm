import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AgencyService {

  constructor(private _http: HttpClient) { }
  add(data: any): Observable <any> {
    return this._http.post('https://localhost/agencies', data);
  }
  update(id: number, data: any): Observable <any> {
    return this._http.put(`https://localhost/agencies/{id}`, data);
  }
  getList(): Observable <any> {
    return this._http.get('https://localhost/agencies', { headers: new HttpHeaders({'Content-Type':'application/json;'})});
  }
  delete(id: number): Observable<any> {
    return this._http.delete(`https://localhost/agencies/${id}`);
  }
}
