import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IntegrationStepComponent } from './integration-step.component';

describe('IntegrationStepComponent', () => {
  let component: IntegrationStepComponent;
  let fixture: ComponentFixture<IntegrationStepComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ IntegrationStepComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(IntegrationStepComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
