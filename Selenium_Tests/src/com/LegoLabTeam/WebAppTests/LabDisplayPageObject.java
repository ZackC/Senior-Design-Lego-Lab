package com.LegoLabTeam.WebAppTests;

import java.util.List;
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

/***
 * The page object that represents the main page of the GUI
 * 
 * @author Zack Coker
 *
 */
public class LabDisplayPageObject 
{
	private final WebDriver driver;  
	
	/***
	 * The constructor for the class.  It verifies that the page loaded
	 * @param newDriver - the web driver
	 */
    public LabDisplayPageObject(WebDriver newDriver) 
    {  
        driver = newDriver;  
        Wait<WebDriver> wait = new FluentWait<WebDriver>(driver)  
           .withTimeout(20, TimeUnit.SECONDS)  
           .pollingEvery(2, TimeUnit.SECONDS);  
  
        wait.until(ExpectedConditions.titleIs("Tiger Automotive Lab Status"));  
    }  
    
    /**
     * The function for navigating to the page
     * @param driver - the webdriver
     * @param baseUrl - the url where the page is stored
     * @return : a new instance of this class
     */
    public static LabDisplayPageObject navigateToSelf(WebDriver driver, String baseUrl)
    {
    	driver.get(baseUrl + "CellOverview.php");
    	return new LabDisplayPageObject(driver);
    }
    
    /***
     * Navigates to cell 1
     * @return returns a page object of cell 1
     */
    public Cell1DisplayPageObject navigateToCell1()
    {
    	getButton(1).click();
    	return new Cell1DisplayPageObject(driver);
    }
    
    /***
     * Navigates to cell 2
     * @return returns a page object of cell 2
     */
    public Cell2DisplayPageObject navigateToCell2()
    {
    	getButton(2).click();
    	return new Cell2DisplayPageObject(driver);
    }
    
    /***
     * Navigates to cell 3
     * @return returns a page object of cell 3
     */
    public Cell3DisplayPageObject navigateToCell3()
    {
    	getButton(3).click();
    	return new Cell3DisplayPageObject(driver);
    }
    
    /***
     * Gets the button for a specific cell
     * @param cellNumber - the cell number for the button to get
     * @return: the button
     */
    public WebElement getButton(int cellNumber)
    {
    	List links = driver.findElements(By.tagName("a"));
    	return (WebElement)links.get(cellNumber - 1);
    	//return driver.findElement(By.id("cell"+cellNumber+"Station1")).findElement(By.xpath("ancestor::a"));
    }
    
    /***
     * Checks if the title is in the button
     * @param cellNubmer - the cell number to get the button from
     * @param title- the title to check
     * @throws Exception
     */
    public void checkTitleIsInButton(int cellNubmer, String title) throws Exception
    {
    	assertTrue(getButton(cellNubmer).getText().contains(title));
    }
    
    /***
     * Checks that the status information is in the button
     * @param cellNumber - the cell number to check
     * @param stationNumber - the station number of the button.
     * @throws Exception
     */
    public void checkStationStatusIsInButton(int cellNumber, int stationNumber) throws Exception
    {
    	assertTrue(getButton(cellNumber).findElement(By.id("cell"+cellNumber+"Station"+stationNumber)).isEnabled());
    }

}
