import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AnalyzeStepComponent } from './analyze-step.component';

describe('AnalyzeStepComponent', () => {
  let component: AnalyzeStepComponent;
  let fixture: ComponentFixture<AnalyzeStepComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AnalyzeStepComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AnalyzeStepComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
