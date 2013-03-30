package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;


public class LabDisplayPageObject 
{
	private final WebDriver driver;  
	  
    public LabDisplayPageObject(WebDriver newDriver) 
    {  
        driver = newDriver;  
        Wait<WebDriver> wait = new FluentWait<WebDriver>(driver)  
           .withTimeout(20, TimeUnit.SECONDS)  
           .pollingEvery(2, TimeUnit.SECONDS);  
  
        wait.until(ExpectedConditions.titleIs("Tiger Automotive Lab Status"));  
    }  
    
    public static LabDisplayPageObject navigateToSelf(WebDriver driver, String baseUrl)
    {
    	driver.get(baseUrl + "Cell%20Overview.php");
    	return new LabDisplayPageObject(driver);
    }
    
    public Cell1DisplayPageObject navigateToCell1()
    {
    	getButton(1).click();
    	return new Cell1DisplayPageObject(driver);
    }
    
    public Cell2DisplayPageObject navigateToCell2()
    {
    	getButton(2).click();
    	return new Cell2DisplayPageObject(driver);
    }
    
    public Cell3DisplayPageObject navigateToCell3()
    {
    	getButton(3).click();
    	return new Cell3DisplayPageObject(driver);
    }
    
    public WebElement getButton(int cellNumber)
    {
    	return driver.findElement(By.id("cell"+cellNumber+"Station1")).findElement(By.xpath("ancestor::a"));
    }
    
    public void checkTitleIsInButton(int cellNubmer, String title) throws Exception
    {
    	assertTrue(getButton(cellNubmer).getText().contains(title));
    }
    
    public void checkStationStatusIsInButton(int cellNumber, int stationNumber) throws Exception
    {
    	assertTrue(getButton(cellNumber).findElement(By.id("cell"+cellNumber+"Station"+stationNumber)).isEnabled());
    }

}
